<?php

print_r($_FILES);

move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/tmp.png");