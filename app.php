<?php
function is_opening_hours()
{
  $flag = false;

  $today_date = date("m/d");
  //日本の祝日
  $japan_holiday = array(
    '01/01', //元日
    '01/10', //成人の日
    '02/11', //建国記念の日
    '02/23', //天皇誕生日
    '03/21', //春分の日
    '04/29', //昭和の日
    '05/03', //憲法記念日
    '05/04', //みどりの日
    '05/05', //こどもの日
    '07/18', //海の日
    '08/11', //山の日
    '09/19', //敬老の日
    '09/23', //秋分の日
    '10/10', //スポーツの日
    '11/03', //文化の日
    '11/23', //勤労感謝の日
  );
  $datetime = new DateTime();
  $week = array("日", "月", "火", "水", "木", "金", "土");
  $w = (int)$datetime->format('w');
  $today_hours = date("H:i");
  $hours_start = '10:00'; //開始時間
  $hours_end = '19:00'; //終了時間
  //10:00~19:00（土、日、日本の祝日を除く）の間だけ表示
  if ((!in_array($today_date, $japan_holiday)) && ($week[$w] != "土" && $week[$w] != "日") && (strtotime($today_hours) >= strtotime($hours_start) && strtotime($hours_end) >= strtotime($today_hours))) :
    $flag = true;
  endif;
  return $flag;
}
