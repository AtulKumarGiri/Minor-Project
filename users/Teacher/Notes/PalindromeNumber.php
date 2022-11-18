<?php
$num=121;
$rev=$num;
$sum=0;
while($num>0)
{
    $r=$num%10;
    $sum+=$r;
    $num/=10;
}
if($sum==$rev)
    echo "It is a Palindrome Number";
else    
    echo "It is a Palindrome Number";
?>