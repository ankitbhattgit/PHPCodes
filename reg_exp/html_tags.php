to check for opening html tags

/<[a-zA-Z][a-zA-Z0-9]*>/


to check tags with attribute like a tags


/<[a-zA-Z][a-zA-Z0-9]*(\s+[a-zA-Z]+="[^"]+")*>/


for closing tags

/</?[a-zA-Z][a-zA-Z0-9]*(\s+[a-zA-Z]+="[^"]+")*>/