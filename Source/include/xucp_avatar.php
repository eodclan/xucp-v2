<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.1
// * 
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
// * Avatar System
// ************************************************************************************//
function is_image($src) {
    if(@getimagesize($src) !== false) {
        return(1);
    } else {
        return(0);
    }
}
?>