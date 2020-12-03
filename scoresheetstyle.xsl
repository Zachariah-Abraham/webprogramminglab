<?xml version="1.0" encoding="UTF-8"?> 
<?xml-stylesheet type="text/css" href="../style.css"?> 
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" > 
<xsl:template match="/"> 
<html> 
<body>
<center>
<div> 
 <h2>Scores</h2> 
 <table class="score-table"> 
 <tr > 
 <th>Name</th> 
 <th>Circle</th> 
 <th>Time Taken</th>  
 </tr> 
 <xsl:for-each select="scores/score"> 
 <tr> 
 <td><xsl:value-of select="name"/></td>
 <td><xsl:value-of select="circles"/></td>
 <td><xsl:value-of select="timetaken"/></td>
 </tr> 
 </xsl:for-each> 
 </table> 
 </div> 
 </center>
 </body> 
</html>
</xsl:template> 
</xsl:stylesheet>