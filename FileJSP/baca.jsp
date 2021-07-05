<div class="jumbotron text-center">
    <h2><b>DAFTAR MASKAPAI</b></h2>
</div>

<%@ page contentType="text/html; charset=utf-8" language="java" 
import="javax.xml.parsers.DocumentBuilderFactory,javax.xml.parsers.DocumentBuilder,org.w3c.dom.*" errorPage="" %>    
<% 
    DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance(); 
    DocumentBuilder db = dbf.newDocumentBuilder(); 
    String [] filexml = {"http://localhost:9999/FileJSP/maskapaiRS.xml", "http://localhost:9999/FileJSP/maskapaiCH.xml","http://localhost:9999/FileJSP/maskapaiMS.xml"};
    String [] maskapai = {"Maskapai RS", "Maskapai CH", "Maskapai MS"};
    for (int m=0; m < 3;m++){
        Document doc = db.parse(filexml[m]); 
        NodeList id = doc.getElementsByTagName("id"); 
        NodeList dari = doc.getElementsByTagName("dari"); 
        NodeList ke = doc.getElementsByTagName("ke"); 
        NodeList depart = doc.getElementsByTagName("depart"); 
        NodeList arrive = doc.getElementsByTagName("arrive"); 
        NodeList price = doc.getElementsByTagName("price"); 
%>
<html>
<head>
  <title>Maskapai</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initialscale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

	<body>
	

	<div class="table-responsive col-sm-10 col-sm-offset-1">
	<div class="text-center">
    
	</div>
		<table class="table table-striped ">
            <h3><center><b><%out.print(maskapai[m]);%></b></center></h3>
		<thead>
			<tr>
				<th>ID</th>
				<th>From</th>
				<th>To</th>
				<th>Depart</th>
				<th>Arrive</th>
				<th>Price</th>
			</tr>
		</thead>
		<%
		for(int i=0;i<=id.getLength()-1;i++) { 
            %>
                    <tr>
                        <td>
                            <%=id.item(i).getFirstChild().getNodeValue()%>
                        </td>
                        <td>
                            <%=dari.item(i).getFirstChild().getNodeValue()%>
                        </td>
                        <td>
                            <%=ke.item(i).getFirstChild().getNodeValue()%>
                        </td>
                        <td>
                            <%=depart.item(i).getFirstChild().getNodeValue()%>
                        </td>
                        <td>
                            <%=arrive.item(i).getFirstChild().getNodeValue()%>
                        </td>
                        <td>
                            <%=price.item(i).getFirstChild().getNodeValue()%>
                        </td>
                    </tr>
		<%
		}
    }
		%>
	</table>
	</div>
	</body>
</html>