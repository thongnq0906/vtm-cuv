function goback() {
    history.back(-1)
}

function confirm_delete(msg){
	if(window.confirm(msg)){
		return true;
	}
	return false;
}