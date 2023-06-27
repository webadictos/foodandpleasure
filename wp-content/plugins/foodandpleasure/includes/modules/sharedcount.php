<?php

class WA_SharedCount
{

    private $API_KEY = "8f6e259eec95f58ee9751e4027de5e32ea9e1b54";
    private $log_file;

    public function __construct()
    {
        if (wp_get_environment_type() === 'production') {
            add_action('init', array($this, 'init'));
            add_action('wa_weekly_cron', array($this, 'check_and_store_shares'));
        }

        // Obtener la ruta del archivo de log
        $upload_dir = wp_upload_dir();
        $this->log_file = $upload_dir['basedir'] . '/shared.log';
    }

    public function init()
    {
        add_action('wp', array($this, 'schedule_weekly_cron'));
        add_action('switch_theme', array($this, 'disable_cron_on_theme_switch'));
    }


    public function schedule_weekly_cron()
    {
        if (!wp_next_scheduled('wa_weekly_cron')) {
            wp_schedule_event(time(), 'weekly', 'wa_weekly_cron');
        }
    }

    public function disable_cron_on_theme_switch()
    {
        if (wp_next_scheduled('wa_weekly_cron')) {
            wp_clear_scheduled_hook('wa_weekly_cron');
        }
    }

    public function check_and_store_shares()
    {
        // Obtener la fecha límite para la consulta (15 días atrás)
        $end_date = date('Y-m-d', strtotime('-15 days'));

        // Obtener la fecha de inicio para la consulta (3 días atrás del día de ejecución del cron)
        $start_date = date('Y-m-d', strtotime('-3 days'));

        // Obtener los posts publicados en el rango de fechas establecido
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'date_query' => array(
                'after' => $end_date,
                'before' => $start_date,
                'inclusive' => true,
            ),
        );
        $query = new WP_Query($args);

        // Obtener el número total de posts en la consulta
        $total_posts = $query->found_posts;
        $this->add_log('Total posts found: ' . $total_posts);

        // $this->send_pushover_alert($total_posts);


        // Verificar si hay posts en el rango de fechas
        $i = 0;
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                // Obtener la URL del post
                $post_url = get_permalink();

                // Realizar la consulta a SharedCount para obtener el número de compartidos
                $api_key = $this->API_KEY; // Reemplaza con tu propia API key de SharedCount
                $shared_count_url = 'https://api.sharedcount.com/v1.1/?apikey=' . $api_key . '&url=' . rawurlencode($post_url);
                $response = wp_remote_get($shared_count_url);
                $this->add_log('Post: ' . $i);


                // Agregar el registro al archivo de log
                $this->add_log('URL: ' . $post_url);
                //error_log('SharedCount Response: ' . print_r($response, true));

                // Verificar si la respuesta fue exitosa
                if (!is_wp_error($response) && $response['response']['code'] === 200) {
                    $body = wp_remote_retrieve_body($response);
                    $data = json_decode($body, true);

                    // Verificar si no hay errores en la respuesta
                    if (!isset($data['Error'])) {
                        $total_shares = 0;

                        // Sumar el atributo 'total_count' de Facebook
                        if (isset($data['Facebook']['total_count'])) {
                            $total_shares += intval($data['Facebook']['total_count']);
                        }

                        // Sumar el valor de Pinterest
                        if (isset($data['Pinterest'])) {
                            $total_shares += intval($data['Pinterest']);
                        }

                        // Almacenar el número total de compartidos en un metakey del post
                        update_post_meta(get_the_ID(), 'wa_total_shares', $total_shares);

                        $this->add_log('Post URL: ' . $post_url . ', Total shares: ' . $total_shares);
                    } else {
                        // Registrar un mensaje de depuración si se produjo un error en la respuesta de SharedCount
                        $this->add_log('Error from SharedCount API: ' . $data['Error']);
                    }
                } else {
                    // Registrar el error en la solicitud para propósitos de depuración
                    $this->add_log('Error: ' . $response->get_error_message());
                }
                $i++;
            }
        }

        // Restaurar la configuración original de la consulta de WordPress
        wp_reset_query();
    }

    public function add_log($message)
    {
        // // Verificar si el archivo de log existe
        // error_log('Creando log');

        // if (!file_exists($this->log_file)) {
        //     // Crear el archivo de log si no existe
        //     touch($this->log_file);
        //     chmod($this->log_file, 0644); // Establecer permisos adecuados al archivo
        // }

        // // Agregar el registro al archivo de log
        // error_log($message . "\n", 3, $this->log_file);
    }


    public function send_pushover_alert($total_posts)
    {
        // Datos de configuración para Pushover
        $token = 'awnjt7hp6pupd2ue5xwjsbonyben71';
        $user = 'u7wdj7xwkdj6w7vi1ozkgjo4tvog9e';

        // Mensaje de la alerta
        $message = 'Se encontraron ' . $total_posts . ' posts en el rango de fechas especificado';

        // Crear el array de datos para enviar la solicitud cURL
        $data = array(
            'token' => $token,
            'user' => $user,
            'title' => 'Server ' . gethostname(),
            'message' => $message,
        );

        // Convertir el array a formato JSON
        $json_data = json_encode($data);

        // Configurar la URL de la API de Pushover
        $url = 'https://api.pushover.net/1/messages.json';

        // Configurar las opciones de la solicitud cURL
        $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $json_data,
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        );

        // Inicializar la instancia de cURL
        $curl = curl_init();

        // Establecer las opciones de cURL
        curl_setopt_array($curl, $curl_options);

        // Realizar la solicitud cURL y obtener la respuesta
        $response = curl_exec($curl);

        // Verificar si hubo algún error en la solicitud
        if (curl_errno($curl)) {
            $error_message = curl_error($curl);
            // Manejar el error según sea necesario
        }

        // Cerrar la instancia de cURL
        curl_close($curl);
    }
}

$shares_widget = new WA_SharedCount();
// if (current_user_can("administrator")) :
//$shares_widget->check_and_store_shares();
// endif;
