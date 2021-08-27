<?php
// Your code here!
$cnp = '1990915053957';
$ok = true;

if(strlen($cnp) == 13)
{
	$ss = $cnp[0];
	$aa = substr($cnp, 1, 2); 
	$ll = substr($cnp, 3, 2); 
	$zz = substr($cnp, 5, 2); 
	$jj = substr($cnp, 7, 2); 
	$nnn = substr($cnp, 9, 3); 
	$cc = $cnp[12]; 
	if(checkdate($ll,$zz, $aa) != 1)
	{
	    echo 'Data invalida';
		$ok = false;
	}
	else if( ($ss == '5' || $ss == '6') && (intval(date('Y'))%100 <= $aa) ) 
	{
	    echo 'An invalid';
		$ok = false;
	}
	else if( intval($jj)<0 && intval($jj) < 53 )
	{
	    echo 'Cod judet invalid';
	    $ok = false;
	}
	else
	{
	    $c = 0;
	    $serie = '279146358279';
	    for($i = 0; $i<12; $i++)
	    {
	        $c = $c + (intval($cnp[$i]) * intval($serie[$i]));
	    }
	    if($c % 10 == 10)
	        $c = 1;
        else
            $c = $c % 10;
	    if($c != $cc)
	    {
	        echo 'Cifra control invalida';
	        $ok = false;
	    }
	}
	
}
if($ok == true)
    echo 'CNP Valid';

?>
