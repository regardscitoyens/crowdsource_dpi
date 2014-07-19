#!/usr/bin/perl
$pdf = shift;
$fileprefix = $pdf;
$fileprefix =~ s/.pdf//;

$first = shift;
$last = shift;
$donotconvert = shift;

system("convert -density 300 $pdf $fileprefix.jpg") unless($donotconvert);

@nb = `ls  $fileprefix-[0-9].jpg`;

#Parlementaire version janvier
if ($#nb == 5) {
@crop = ('35%,15%,50%', '5%,32%,30%,29%,4%','5%,36%,49%,10%', '5%,32%,27%,28%,5%', '5%,32%,26%,32%,2%', '5%,28%,67%');
}elsif($#nb == 6) {
#Parlementaire version decembre
@crop = ('20%,30%,50%', '5%,20%,38%,32%,5%','5%,40%,50%,5%', '5%,48%,42%,5%', '5%,23%,32%,35%,5%', '5%,59%,17%,19%', "15%,30%,55%");
}

#Ministres
#@crop = ('30%,21%,49%', '5%,31%,59%,5%','5%,49%,41%,5%', '5%,42%,43%,10%', '5%,45%,45%,5%', '5%,50%,40%,5%');
$last = $last || $#crop;

for($i = $first*1 ; $i <= $last ; $i++) {
    $size = 0; $y = 0;
    @positions = split ',', $crop[$i];
    $tmpdir = '.tmp/';
    mkdir($tmpdir);
    foreach $pc (@positions) {
	$resfile = 'cropped_'.$fileprefix."-".$i."_".$y++.".jpg";
	system("convert ".$fileprefix."-".$i.".jpg -crop 100%x".$pc."+0+".$size." ".$tmpdir.$resfile);
	open(IDENT, "identify ".$tmpdir.$resfile." |");
	$ident = <IDENT>,
	$ident =~ /x([\d+]+) /;
	$size += $1;
	system("mogrify -resize 1000x1000 ".$tmpdir.$resfile);
	system("convert ".$tmpdir.$resfile." -fill black -colorize 50% ".$tmpdir."black_".$resfile);
	system("convert ".$tmpdir."black_".$resfile." -gravity South -crop 1000x100+0+0 ".$tmpdir."black_bottom_".$resfile);
	system("convert ".$tmpdir."black_".$resfile." -gravity North -crop 1000x100+0+0 ".$tmpdir."black_top_".$resfile);
    }
    for($y = 0 ; $y <= $#positions ; $y++) {
	$cmd = "convert ";
	if ($y) {
	    $cmd .= $tmpdir."black_bottom_cropped_".$fileprefix.'-'.$i.'_'.($y*1-1).'.jpg ';
	}
	$cmd .= $tmpdir."cropped_".$fileprefix.'-'.$i.'_'.$y.'.jpg ';
	if ($y != $#positions) {
	    $cmd .= $tmpdir."black_top_cropped_".$fileprefix.'-'.$i.'_'.($y*1+1).'.jpg ';	    
	}
	$cmd .= ' -append '.$fileprefix.'-mask-'.$i.'_'.$y.'.jpg';
	system($cmd);
    }
}
