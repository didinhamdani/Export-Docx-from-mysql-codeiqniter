<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Exported Posts in PDF File</title>
    </head>
    <body>
        <?php
        header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=\"posts.doc\"");
        ?>


        <div id="container">
            <h4>Posts</h4>
            <tableborder="1">
                <tr>
                    <th>title</th>
                    <th>content</th>
                    <th>group</th>
                    <th>video_url</th>
                    <th>pic_path</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>yes_no</th>
                    <th>single-line-text</th>
                    <th>para_text</th>
                    <th>pdf_file_name</th>
                    <th>add_photo_name</th>
                </tr>
<?php
foreach ($member as $rows) {
    ?>
                    <tr>
                        <td><?php echo $rows['title'] ?></td>
                        <td><?php echo $rows['content'] ?></td>
                        <td><?php echo $rows['group'] ?></td>
                        <td><?php echo $rows['video_url'] ?></td>
                        <td><?php echo $rows['pic_path'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['phone'] ?></td>
                        <td><?php echo $rows['email'] ?></td>
                        <td><?php echo $rows['yes_no'] ?></td>
                        <td><?php echo $rows['single-line-text'] ?></td>
                        <td><?php echo $rows['para_text'] ?></td>
                        <td><?php echo $rows['pdf_file_name'] ?></td>
                        <td><?php echo $rows['add_photo_name'] ?></td>
                    </tr>
    <?php
}
?>
            </table>

            <br> <br>

        </div>
    </body>
</html>