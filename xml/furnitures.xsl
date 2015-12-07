<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
  <body>
    <table style="border-collapse: collapse;width: 100%;border: 1px solid #ddd;text-align: left;">
      <tr style="background-color: #f2f2f2">
        <th style="border: 1px solid #ddd;text-align: left; padding: 7px;">ID</th>
        <th style="border: 1px solid #ddd;text-align: left; padding: 7px;">Name</th>
        <th style="border: 1px solid #ddd;text-align: left; padding: 7px;">Type</th>
        <th style="border: 1px solid #ddd;text-align: left; padding: 7px;">Color</th>
        <th style="border: 1px solid #ddd;text-align: right; padding: 7px;">Price (€)</th>
      </tr>

      <xsl:for-each select="furnitures/furniture">
      <tr>
        <td style="border: 1px solid #ddd;text-align: left;padding: 7px;"><xsl:value-of select="id"/></td>
        <td style="border: 1px solid #ddd;text-align: left;padding: 7px;"><xsl:value-of select="name"/></td>
        <td style="border: 1px solid #ddd;text-align: left;padding: 7px;"><xsl:value-of select="type"/></td>
        <td style="border: 1px solid #ddd;text-align: left;padding: 7px;"><xsl:value-of select="color"/></td>
        <td style="border: 1px solid #ddd;text-align: right;padding: 7px;"><xsl:value-of select="price"/>.00</td>
      </tr>
      </xsl:for-each>

    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>