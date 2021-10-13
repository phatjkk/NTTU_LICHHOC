<?php
$mssv = $_GET["MSSV"];
if($mssv){
$url = "https://phongdaotao2.ntt.edu.vn/ajaxpro/TraCuuThongTin,PMT.Web.PhongDaoTao.ashx";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Connection: keep-alive",

   "X-AjaxPro-Method: GetDanhSachSinhVien",
   "Content-Type: text/plain; charset=UTF-8",
   "sec-ch-ua-mobile: ?0",
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36 Edg/94.0.992.38",
   "Accept: */*",
   "Origin: https://phongdaotao2.ntt.edu.vn",
   "Sec-Fetch-Site: same-origin",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Dest: empty",
   "Referer: https://phongdaotao2.ntt.edu.vn/TraCuuThongTin.aspx",
   "Accept-Language: en-US,en;q=0.9,vi;q=0.8,pt;q=0.7",
   "Cookie: ASP.NET_SessionId=sc2~bdv3hplknpkkrjxozxmjco1z",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"currentPage":1,"maSinhVien":"'.$mssv.'","hoDem":"","Ten":"","ngaySinh":"","maLopHoc":""}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
preg_match_all('/k=(.*?)">/m', $resp, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
header( "Location: ". 'https://phongdaotao2.ntt.edu.vn/LichHocLichThiTuan.aspx?k='. substr($matches[0][1], 0, -1));
// var_dump($matches);

}

?>

