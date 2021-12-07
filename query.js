class connection
{
	constructor(intype,inurl)
	{
		this.xmlhttp=new XMLHttpRequest();
		this.xmlhttp.open(intype,inurl,false);
		this.xmlhttp.onreadystatechange=function(){};
	};
	setF(inf)
	{
		this.xmlhttp.onreadystatechange=inf;
		return this;
	};
	send()
	{
		this.xmlhttp.send(null);
		return this.xmlhttp.responseText;
	};
	send(inmsg)
	{
		this.xmlhttp.send(inmsg);
		return this.xmlhttp.responseText;
	};

};

function isJSON(str) {
    try {
	JSON.parse(str);
    } catch (e) {
	return false;
    }
    return true;
}