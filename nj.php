<?php

if(!isset($argv[1])) {
	exit("\n\n\nphp nj.php edicao numpags data\n\n\n\n");
}

$edicao = $argv[1];

$numpags = $argv[2];

$data = $argv[3];

if(preg_match('#/Ler/(\d+)#is', $edicao, $hash)) {
	$edicao = $hash[1];
}

$url  = 'http://www.nuvemdojornaleiro.com.br/Ler/'.$edicao;



// exit;

mkdir('edicao/'.$data);

for($i = 1; $i <= $numpags; $i++) {
	$pathPagina = 'http://www.nuvemdojornaleiro.com.br/Contents/Imagem/'.$edicao.'/pg-'.$i.'.jpg';
	`wget '{$pathPagina}' --referer '{$url}' -O 'edicao/{$data}/e{$i}.jpg'`;
	echo 'wget \''.$pathPagina.'\' --referer \''.$url.'\' -O \'edicao/'.$data.'/e'.str_pad($i, 2, 0, STR_PAD_LEFT).'.jpg\'';
	//`curl 'http://www.nuvemdojornaleiro.com.br/Contents/Imagem/13728021/pg-{$i}.jpg' -H 'Host: www.nuvemdojornaleiro.com.br' -H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0' -H 'Accept: */*' -H 'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3' --compressed -H 'Referer: {$url}' -H 'Cookie: _gada_id.0574=300e6a2185ecabc1.1465471255.5.1468334838.1467108830; _ga=GA1.3.114277093.1465471255; __utma=135053294.114277093.1465471255.1467108815.1468334830.5; __utmz=135053294.1468334830.5.5.utmcsr=intranet.fabricadeideias.com.br|utmccn=(referral)|utmcmd=referral|utmcct=/; CAKEPHP=7snpkb886pbbs2gbj2n7jjoud6; _gada_ses.0574=*; __utmb=135053294.3.10.1468334830; __utmc=135053294; privAu=0; abdAu=1' -H 'Connection: keep-alive' -o 'edicao/{$data}/pg{$i}.jpg'`;
}


