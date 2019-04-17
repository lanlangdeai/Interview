<?php 

// 数据处理

function export(){
    set_time_limit(-1);
    @ini_set('memory_limit','512M');
    $columns = ['文章ID', '文章标题'];
    $fileName = 'orderlog' . '.csv';
    //设置好告诉浏览器要下载excel文件的headers
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="'. $fileName .'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    $fp = fopen('php://output', 'a');//打开output流
    fputcsv($fp, $columns);//将数据格式化为CSV格式并写入到output流中

    $query = new Query();
    $orderModel = $query->select("*")
        ->from("{{%tuan_forum_thread}}")
        ->orderBy('tid asc')
        ->limit(80000) ;

    foreach ($orderModel->batch(100) as $orders) {
        foreach ($orders as $order) {
            $rowData = [
                $order['tid'], "\t" .$order['subject'],
            ];
            fputcsv($fp, $rowData);
        }
        ob_flush();
        flush();//必须同时使用 ob_flush() 和flush() 函数来刷新输出缓冲。
    }

    fclose($fp);

}