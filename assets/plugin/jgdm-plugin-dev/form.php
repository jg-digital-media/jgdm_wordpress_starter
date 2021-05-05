<div class="wrap">

<h2>Staff Details</h2>

<form method="post" action="options.php">

    
    <?php settings_fields( 'this_is_the_settings_field_group' ); ?>
    <?php do_settings_sections( 'this_is_the_settings_field_group' ); ?>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Field Name</th>
        <td><input type="text" name="field_name" value="<?php echo esc_attr( get_option('field_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Field Phone Number</th>
        <td><input type="text" name="field_phone" value="<?php echo esc_attr( get_option('field_phone') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Field Email</th>
        <td><input type="text" name="field_email" value="<?php echo esc_attr( get_option('field_email') ); ?>" /></td>
        </tr>
    </table>

</form>
</div>

<!-- 


    echo "<div class=\"wrap\">

    <h2>Staff Details</h2>
    
    /* <form method=\"post\" action=\"options.php\">
    
        
    <?php settings_fields( 'this_is_the_settings_field_group' ); ?>
        <?php do_settings_sections( 'this_is_the_settings_field_group' ); ?>
    
        <table class=\"form-table\">
            <tr valign=\"top\">
            <th scope=\"row\">Field Name</th>
            <td><input type=\"text\" name=\"field_name\" value=\"  <?php . " echo esc_attr( get_option('field_name') ); " ?> /> </td>
            </tr>
             
            <tr valign=\"top\">
            <th scope=\"row\">Field Phone Number</th>
            <td><input type=\"text\" name=\"field_phone\" value=\" . <?php echo esc_attr( get_option('field_phone') ); ?> /></td>
            </tr>
            
            <tr valign=\"top\">
            <th scope=\"row\">Field Email</th>
            <td><input type=\"text\" name=\"field_email\" value=\" . <?php echo esc_attr( get_option('field_email') ); ?> /></td>
            </tr>
        </table>
    
    </form>
    </div>";  */


--?