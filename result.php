<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php echo htmlspecialchars($_GET["id"]); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
function abbreviate_numbers(int $num)
{
    $num_len = strlen($num);
    switch ($num_len)
    {
        case 1:
            return $num;
        case 2:
            return $num;
        case 3:
            return $num;
        case 4:
            return number_format($num, 0, ".", " ");
        case 5:
            return intval(substr($num, 0, -2)) / 10 . "K";
        case 6:
            return intdiv($num, 1000) . "K";
        case 7:
            return intval(substr($num, 0, -5)) / 10 . "M";
        case 8:
            return intval(substr($num, 0, -5)) / 10 . "M";
        case 9:
            return intdiv($num, 1000000) . "M";
        case 10:
            return intval(substr($num, 0, -8)) / 10 . "B";
        case 11:
            return intval(substr($num, 0, -8)) / 10 . "B";
        case 12:
            return intdiv($num, 1000000000) . "B";
        case 13:
            return intval(substr($num, 0, -11)) / 10 . "T";
        case 14:
            return intval(substr($num, 0, -11)) / 10 . "T";
        case 15:
            return intdiv($num, 1000000000000) . "T";
        case 16:
            return intval(substr($num, 0, -14)) / 10 . "Q";
        case 17:
            return intval(substr($num, 0, -14)) / 10 . "Q";
        case 18:
            return intdiv($num, 1000000000000000) . "Q";
        default:
            return number_format($num, 0, ".", " ");
    }
}
/* Check if it is april fools day */

$id = htmlspecialchars($_GET["id"]);

$json = file_get_contents('https://returnyoutubedislikeapi.com/Votes?videoId=' . $id . '&ref=coreyx');
$obj = json_decode($json);
$viddeleted = $obj->deleted;
    function get_youtube_title($video_id)
    {
        $html = 'https://www.googleapis.com/youtube/v3/videos?id=' . $video_id . '&key=AIzaSyBHRp-QtGP3uQkDQUXzMrHRiG-cxozG2K0&part=snippet,contentDetails,statistics,status&ref=coreyx';
        $response = file_get_contents($html);
        $decoded = json_decode($response, true);
        foreach ($decoded['items'] as $items)
        {
            $title = $items['snippet']['title'];
            return $title;
        }
    }
        function get_youtube_description($video_id)
        {
            $html = 'https://www.googleapis.com/youtube/v3/videos?id=' . $video_id . '&key=AIzaSyBHRp-QtGP3uQkDQUXzMrHRiG-cxozG2K0&part=snippet,contentDetails,statistics,status&ref=coreyx';
            $response = file_get_contents($html);
            $decoded = json_decode($response, true);
            foreach ($decoded['items'] as $items)
            {
                $title = $items['snippet']['description'];
                return $title;
            }
        }
        function get_youtube_channel_name($video_id)
        {
            $html = 'https://www.googleapis.com/youtube/v3/videos?id=' . $video_id . '&key=AIzaSyBHRp-QtGP3uQkDQUXzMrHRiG-cxozG2K0&part=snippet,contentDetails,statistics,status&ref=coreyx';
            $response = file_get_contents($html);
            $decoded = json_decode($response, true);
            foreach ($decoded['items'] as $items)
            {
                $title = $items['snippet']['channelTitle'];
                return $title;
            }
        }
        function make_links_clickable($text){
    return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
}
if ($obj->deleted == true or $obj->status == 404)
{
    include errorvid.php;
}
else {
        echo '<ul class="list-group">';
        echo '<li class="list-group-item">Video ID: ' . htmlspecialchars($id) . '</li>';
        echo '<li class="list-group-item">Title: ' . make_links_clickable(get_youtube_title($id)) . '</li>';
        echo '<li class="list-group-item">Description: ' . make_links_clickable(get_youtube_description($id)) . '</li>';
                echo '<li class="list-group-item">From YouTube Channel: ' . get_youtube_channel_name($id) . '</li>';
        echo '<li class="list-group-item">Dislikes: ' . $obj->dislikes . '</li>';
        echo '<li class="list-group-item"><i class="material-icons">
thumb_up
</i>' . $obj->likes . '</li>';
        echo '<li class="list-group-item">Date created: ' . $obj->dateCreated . '</li>';
        echo '<li class="list-group-item">Views: ' . $obj->viewCount . '</li>';
        echo '<li class="list-group-item">Dislikes Powered By <a href="http://returnyoutubedislike.com">Return YouTube Dislike</a>.</li>';
        echo '</ul>';

} 
?>