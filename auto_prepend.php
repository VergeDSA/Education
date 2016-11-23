<?php
    register_shutdown_function('shutdown');
    function shutdown() {
    $error = error_get_last();
    print_r(error_get_last());
        if (
            // если в коде была допущена ошибка
            is_array($error) &&
            // и это одна из фатальных ошибок
            in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])
	    ) {
    		// очищаем буфер вывода (о нём мы ещё поговорим в последующих статья
	        while (ob_get_level()) {
        	    ob_end_clean();
    		}
    	    // выводим описание проблемы
	    $file=highlight_file($error['file'],true);
	    $file = explode ( '<br />', $file );
	    $i=0;
            $br=0;
            $href=FALSE;
            include_once 'header.html';
	    foreach ( $file as $line ) {
                if (str_replace("&nbsp;",'',$line)=='') $line=str_replace("&nbsp;",'',$line) ;
		$i++;
	    	if (!strlen($line)) {
                    $br++;
                    continue;
                }
                if ($i==$error['line']) {
                    echo '<div class="highlighted">',$href,'<br />',$line,'</div>';
                    $br=0;                
                }
		else if ($href && $i!=$error['line']+1+$br) echo $href,'<br />';
                $href=$line;
	    }
            
    	    echo '</span>','<h1>Сервер находится на техническом обслуживании, зайдите позже</h1>';
	    include_once 'footer.html';
            
                }
    }
?>
