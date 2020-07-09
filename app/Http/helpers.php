<?php
function setActiveRoute($route)
{
	return request()->routeIs($route) ? 'active' : '';
}

function openMenu($route)
{
	return request()->routeIs($route) ?'display: block;' : '';
}