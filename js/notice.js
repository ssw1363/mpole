function board_detail(no){ 
    $('#main').load('./php/board_detail.php', {'board_no' : no});
    goTop();
}

function write_notice(){ 
    $('#main').load('./php/board_add_form.php');
}

function go_list(page){
    $('#main').load('./php/notice.php', {"currentPage" : page});
    goTop();
}

function post_detail(no){ 
    $('#main').load('./php/post_detail.php', {'post_no' : no});
    goTop();
}

function post_list(){ 
    $('#main').load('./php/post.php');
    goTop();
}