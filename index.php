<?php
/*
@Author Name : Onjon Shahadat Hossain
@Email : onjon_sh@yahoo.com

@Project Name : Make Dynamic HTML Table using PHP 
@Version : 1.0.1
@Release Date : 23rd October, 2013
*/ 

// Errors and Warning Response Status 
error_reporting( E_ALL ); 

// Generate Spaces 
function print_spaces( $a , $fo ) {    
    for( $i = 0 ; $i < $a ; $i++ ) {
        // Append Spaces 
        fputs( $fo , "\t" ) ;
    }    
}


// Append Data 
function print_values( $a , $fo ) {    
    fputs( $fo , $a ) ;
    fputs( $fo , "\r\n" ) ;
}

// Check POST Data 
if( isset( $_POST[ 'gen' ] ) ) {
    // TAB space Counter 
    $tab_counter = 0 ;
    
    // Get Generated File Name 
    $file_name = $_POST[ 'file' ] ;    
    
    // Get Rows 
    $rows = $_POST[ 'rows' ] ;
    
    // Get Cols 
    $cols = $_POST[ 'cols' ] ;
    
    // File Create 
    $fo = fopen( $file_name . ".php" , 'w' ) ;    
    
    // Append Data
    fputs( $fo , "<?php" ) ;
    fputs( $fo , "\r\n" ) ;
    fputs( $fo , "\r\n" ) ;
    fputs( $fo , "?>" ) ;
    fputs( $fo , "\r\n" ) ;
    fputs( $fo , "\r\n" ) ;
    print_spaces( $tab_counter , $fo ) ;
    print_values( "<html>" , $fo ) ;
    $tab_counter++ ;
    print_spaces( $tab_counter , $fo ) ;
    print_values( "<body>" , $fo ) ;    
    
    $tab_counter++ ;
    print_spaces( $tab_counter , $fo ) ;
    print_values( "<center>" , $fo ) ;
    
    $tab_counter++ ;
    print_spaces( $tab_counter , $fo ) ;
    print_values( "<table>" , $fo ) ;
    
    for( $i = 0 ; $i < $rows ; $i++ ) {
        $tab_counter++ ;
        print_spaces( $tab_counter , $fo ) ;
        print_values( "<tr>" , $fo ) ;
        
        for( $j = 0 ; $j < $cols ; $j++ ) {
            $tab_counter++ ;
            print_spaces( $tab_counter , $fo ) ;
            print_values( "<td>" , $fo ) ;
            print_spaces( $tab_counter , $fo ) ;
            print_values( "</td>" , $fo ) ;
            $tab_counter-- ;
        }
        
        print_spaces( $tab_counter , $fo ) ;
        print_values( "</tr>" , $fo ) ;
        $tab_counter-- ;
    }
    
    print_spaces( $tab_counter , $fo ) ;
    print_values( "</table>" , $fo ) ;
    $tab_counter-- ;
    
    
    print_spaces( $tab_counter , $fo ) ;
    print_values( "</center>" , $fo ) ;
    $tab_counter-- ;
    
    print_spaces( $tab_counter , $fo ) ;
    print_values( "</body>" , $fo ) ;
    $tab_counter-- ;
    print_spaces( $tab_counter , $fo ) ;
    print_values( "</html>" , $fo ) ;
    
    // File Close 
    fclose( $fo ) ;
}

?>

<html>
    <head>
    </head>
    <body>
        <form action = '' method = 'post' >
            <center>
                <table>
                    <tr>
                        <td>
                        File Name:
                        </td>
                        <td>
                        <input name = 'file' required = 'true' type = 'text' placeholder = 'Place your file name here'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Number of Rows:
                        </td>
                        <td>
                        <input name = 'rows' required = 'true' type = 'text' placeholder = 'integer value'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Number of Columns:
                        </td>
                        <td>
                        <input name = 'cols' required = 'true' type = 'text' placeholder = 'integer value'/>
                        </td>
                    </tr>
                    <tr>
                        <td>                        
                        </td>
                        <td>
                        <input name = 'gen' type = 'submit' />
                        </td>
                    </tr>
                </table>
            </center>
        </form>
    </body>
</html>
