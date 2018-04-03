/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    $("#school_id").autocomplete({
        source: "<?php echo SITE_URL ?>ajax/search_school.php",
        minLength: 1
    });
    $("#school_name").autocomplete({
        source: "<?php echo SITE_URL ?>ajax/search_school.php",
        minLength: 2,
        select: function (event, ui) {
            $("#school_name").val(ui.item.label); // display the selected text
            $("#school_id").val(ui.item.value); // save selected id to hidden input
            return false;
        },
    });
});
