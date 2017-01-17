<?php

function isLogin(){
	if (!session(usernum)) {
		return false;
	}else{
		return true;
	}
}