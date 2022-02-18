<?php 
include "../../configuration/config.php";

$ip = $_SERVER['REMOTE_ADDR'];
$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
$ipInfo = json_decode($ipInfo);
$timezone = $ipInfo->timezone;
date_default_timezone_set($timezone);

$curr_date = date("d-m-Y");
$curr_time = date("h:ia");

if (isset($_POST['postsub']) && isset($_POST['postinpdata'])) {
    $post_inp_data = $_POST['postinpdata'];
    $postsub = $_POST['postsub'];
    $post_add_to_db_sql = "INSERT INTO $instit" . "_feeder ( `postby`, `posttime`, `postdate`, `postcontent` ) VALUES (\"$instit\",\"$curr_time\",\"$curr_date\",\"$post_inp_data\")";
    $post_request_init = mysqli_query($conn, $post_add_to_db_sql);
    
}
?>

<div>
            <!-- Feeder -->
            <div class="mx-3 w-100 feeder">


                <div id="feedspot"></div>

                <?php
                $GLOBALS['feed_start'] = 1;
                $fetch_start = $GLOBALS['feed_start'];
                $GLOBALS['feed_fetch_limit'] = 10;
                $fetch_end = $GLOBALS['feed_fetch_limit'];
                if ($fetch_start == 1) {
                    $instit_feed_fetch_sql = "SELECT * FROM $instit" . "_feeder ORDER BY `id` DESC LIMIT $fetch_end;";
                } else {
                    $instit_feed_fetch_sql = "SELECT * FROM $instit" . "_feeder ORDER BY `id`='$fetch_start' DESC LIMIT $fetch_end;";
                }

                $instit_feed_result = mysqli_query($conn, $instit_feed_fetch_sql);
                $instit_fetched_feed_array = mysqli_fetch_all($instit_feed_result, $mode = MYSQLI_ASSOC);
                $encoded_feed_array = json_encode($instit_fetched_feed_array);
                ?>
                <script>
                    let feed_array = <?php echo $encoded_feed_array ?>;
                    let instit = '<?php echo $instit ?>';
                    let instit_pic = '<?php echo $instit_fetched_array['schoolprofile'] ?>';
                    let schoolName = '<?php echo $instit_fetched_array['schoolname'] ?>'
                </script>

                <script src="./post-mapper.js"></script>



            </div>
            <div class="bg-warning postman">
                <form id="post-form"  class="d-flex" method="POST">

                    <textarea id="post-data-input" class=" post-man-input" name="postinpdata" type="text" rows="2" onchange="postchange()" onkeydown="postchange()" onkeypress="postchange()" onkeyup="postchange()" on></textarea>
                    <button id='post-btn' class="post-man-btn btn bg-primary" type="submit" name="postsub">POST</button>
                    <script>
                        document.getElementById('post-btn').setAttribute('disabled', 'true');

                        function postchange() {
                            if (document.getElementById('post-data-input').value !== "") {
                                document.getElementById('post-btn').removeAttribute('disabled');
                            } else {
                                document.getElementById('post-btn').setAttribute('disabled', 'true');
                            }
                        }
                    </script>
                    
                </form>

            </div>
        </div>