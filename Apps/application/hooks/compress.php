<?php



function compress()

{

 $CI =& get_instance();

 $buffer = $CI->output->get_output();

 $replace = '';

 $search = array(

    '/>[^S ]+/s', 

    '/[^S ]+',

     '<',

     '\1',

  "//<![CDATA[n".'1'."n//]]>"

  );

 $buffer = str_replace($search, $replace, $buffer);

 $CI->output->set_output($buffer);

 $CI->output->_display();

}



?>