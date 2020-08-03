function board_detail(no){ 
    $('#main').load('./php/board_detail.php', {'board_no' : no});
}

function write_notice(){ 
    $('#main').load('./php/board_add_form.php');
}

function go_list(page){
    $('#main').load('./php/notice.php', {"currentPage" : page});
}