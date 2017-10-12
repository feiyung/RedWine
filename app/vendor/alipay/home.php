<?php
/**
 * Created by PhpStorm.
 * User：PengSongyang
 *
 * Date: 2017/1/6
 * Time: 上午10:11
 */

include 'Alipay.class.php';

$Alipay = new Alipay_interface();

$html = $Alipay->alipay('20170106101413', 'ZY1390', 0.01, 'cheshi');

echo $html;

