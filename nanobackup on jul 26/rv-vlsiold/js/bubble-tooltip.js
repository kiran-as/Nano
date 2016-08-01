/************************************************************************************************************
Ajax dynamic list
Copyright (C) September 2005  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2006
Owner of DHTMLgoodies.com
	
************************************************************************************************************/	
function showToolTip(e,text,zin){
	if(document.all)e = event;
	
	
	//alert(document.getElementById(text).innerHTML);
	//alert(document.getElementById('bubble_tooltip').style.zIndex);
	document.getElementById('bubble_tooltip').style.zIndex=zin;
	//alert(document.getElementById('bubble_tooltip').style.zIndex);

	var obj = document.getElementById('bubble_tooltip');
	var obj2 = document.getElementById('bubble_tooltip_content');
	obj2.innerHTML = document.getElementById(text).innerHTML;
	obj.style.display = 'block';
	var st = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
	if(navigator.userAgent.toLowerCase().indexOf('safari')>=0)st=0; 
	var leftPos = e.clientX - 130;
	if(leftPos<0)leftPos = 0;
	obj.style.left = leftPos + 'px';
	//alert(st);
	obj.style.top = e.clientY - obj.offsetHeight -5 + st+'px';
}	

function hideToolTip()
{
	document.getElementById('bubble_tooltip').style.display = 'none';
	document.getElementById('bubble_tooltip').style.zIndex=50;
	
}