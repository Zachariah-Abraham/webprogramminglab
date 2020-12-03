<%@ page import="java.io.*, java.util.*"%>
<htnl>
<head> 
    <title> 
        Register
    </title>
</head>
<body>
    <center>
        <h2>HTTP Header Request Example</h2>
        <table width = "100%" border = "1" align = "center">
           <tr bgcolor = "#949494">
              <th>Param Name</th>
              <th>Param Value(s)</th>
           </tr>
           <%
              Enumeration paramNames = request.getParameterNames();
              while(paramNames.hasMoreElements()) {
                 String paramName = (String)paramNames.nextElement();
                 out.print("<tr><td>" + paramName + "</td>\n");
                 String paramValue = request.getParameter(paramName);
                 out.println("<td> " + paramValue + "</td></tr>\n");
              }
           %>
        </table>
     </center>
</body>
</htnl>