#!/usr/bin/perl
$pdf = shift;
$fileprefix = $pdf;
$fileprefix =~ s/.pdf//;

$first = shift;
$last = shift;

system("convert -density 300 $pdf $fileprefix.jpg");

#Parlementaire
#@crop = ('35%,15%,50%', '5%,35%,28%,28%,5%','5%,36%,49%,10%', '5%,32%,27%,28%,5%', '5%,32%,26%,32%,2%', '5%,28%,67%');

#Ministres
@crop = ('30%,21%,49%', '5%,31%,59%,5%','5%,49%,41%,5%', '5%,42%,43%,10%', '5%,45%,45%,5%', '5%,50%,40%,5%');
$last = $last || $#crop;

for($i = $first*1 ; $i <= $last ; $i++) {
    $size = 0; $y = 0;
    @positions = split ',', $crop[$i];
    $tmpdir = '.tmp/';
    mkdir($tmpdir);
    foreach $pc (@positions) {
	$resfile = 'cropped_'.$fileprefix."-".$i."_".$y++.".jpg";
	system("convert ".$fileprefix."-".$i.".jpg -crop 100%x".$pc."+0+".$size." ".$tmpdir.$resfile);
	system("convert ".$tmpdir.$resfile." -fill black -colorize 50% ".$tmpdir."black_".$resfile);
	open(IDENT, "identify ".$tmpdir.$resfile." |");
	$ident = <IDENT>,
	$ident =~ /x([\d+]+) /;
	$size += $1;
    }
    for($y = 0 ; $y <= $#positions ; $y++) {
	$cmd = "convert ";
	for($z = 0 ; $z <= $#positions ; $z++) {
	    $add = 'black_cropped_';
	    $add = 'cropped_' if ($z == $y) ;
	    $cmd .= $tmpdir.$add.$fileprefix.'-'.$i.'_'.$z.'.jpg ';
	}
	$cmd .= ' -append '.$fileprefix.'-mask-'.$i.'_'.$y.'.jpg';
	system($cmd);
    }
}
