<?php 

// Loading table class
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class ContactUsData extends WP_List_Table {
    private function get_contactus_data()
      {
            global $wpdb;

            return $wpdb->get_results(
                  "SELECT * from {$wpdb->prefix}contactdetails",
                  ARRAY_A
            );
      }

      // Define table columns
      function get_columns()
      {
            $columns = array(
                  'cb'            => '<input type="checkbox" />',
                  'id' => 'ID',
                  'name' => 'Name',
                  'phonenumber'    => 'Phone Number',
                  'servicename'      => 'Service Name',
                  'email'      => 'Email Address',
                  'message'   =>  'Message'
            );
            return $columns;
      }

      // Bind table with columns, data and all
      function prepare_items()
      {
            $columns = $this->get_columns();
            $hidden = array();
            $sortable = array();
            $this->_column_headers = array($columns, $hidden, $sortable);

            $this->items = $this->get_contactus_data();
      }

      // bind data with column
      function column_default($item, $column_name)
      {
            switch ($column_name) {
                  case 'id':
                  case 'name':
                  case 'phonenumber':
                        return $item[$column_name];
                  case 'servicename':
                        return $item[$column_name];
                  case 'email':
                        return $item[$column_name];
                  case 'message':
                        return ucwords($item[$column_name]);
                  default:
                        return print_r($item, true); //Show the whole array for troubleshooting purposes
            }
      }

      function column_cb($item)
      {
            return sprintf(
                  '<input type="checkbox" name="contactdata[]" value="%s" />',
                  $item['id']
            );
      }
}

// Adding menu
function contact_menu_item()
{
    add_menu_page(
        'Contact Us Data',
        'Contact Us Data',
        'manage_options',
        'contact_us_table',
        'contactus_data_init'
    );
}
add_action('admin_menu', 'contact_menu_item');

// Plugin menu callback function
function contactus_data_init()
{
      // Creating an instance
      $contactusTable = new ContactUsData();

      echo '<div class="wrap"><h2>Contact Us Entries</h2>';
      // Prepare table
      $contactusTable->prepare_items();
      // Display table
      $contactusTable->display();
      echo '</div>';
}
