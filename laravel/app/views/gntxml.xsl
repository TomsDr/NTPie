<?xml version="1.0" ?>
<xsl:stylesheet version="2.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns="http://www.w3.org/1999/xhtml">
<xsl:output method="xhtml" indent="yes" encoding="windows-1257" />

  <xsl:template match="/">
    <xsl:apply-templates select="PriceCatalog" />
  </xsl:template>

  <xsl:template match="PriceCatalog">
    <html>
      <head>
        <meta name="author" content="GNT Group, 2004" />
        <meta name="description" content="XML Interface Samples" />
        <meta name="robots" content="index" />
        <meta name="keywords" content="GNT Group, EWG" />
        <title>XML Interface static XML page rendering sample</title>
      </head>
    </html>
    <body>
    <xsl:apply-templates select="PriceCatHdr" />
    <xsl:apply-templates select="ListofCatalogDetails" />
    </body>
  </xsl:template>

  <xsl:template match="PriceCatHdr">
    <table width="40%" cellpadding="0" cellspacing="0" border="1">
      <tr>
        <td align="right" bgcolor="red"><b>Date:</b></td>
        <td bgcolor="lime"><xsl:value-of select="Date" /></td>
      </tr>
      <tr>
        <td align="right" bgcolor="red"><b>Currency:</b></td>
        <td bgcolor="lime"><xsl:value-of select="Currency" /></td>
      </tr>
      <tr>
        <td align="right" bgcolor="red"><b>Description:</b></td>
        <td bgcolor="lime"><xsl:value-of select="Description" /></td>
      </tr>
      <tr>
        <td align="right" bgcolor="red"><b>Catalog Number:</b></td>
        <td bgcolor="lime"><xsl:value-of select="CatNumber" /></td>
      </tr>
    </table>
    <br/>
  </xsl:template>
                                                                               
  <xsl:template match="ListofCatalogDetails">
    <table width="100%" cellpadding="0" cellspacing="0" border="1">
      <tr bgcolor="cyan">
        <th>ProductID</th>
        <th>Code</th>
        <th>EAN</th>
        <th>Link</th>
        <th>Description</th>
        <th>Local Qty</th>
        <th>Fin Qty</th>
      </tr>
      <xsl:for-each select="CatalogItem">
        <xsl:apply-templates select="Product" />
      </xsl:for-each>
    </table>
  </xsl:template>

  <xsl:template match="Product">
    <tr>
      <td align="center"><xsl:value-of select="ProductID" /></td>
      <td align="left"><xsl:value-of select="PartNumber" /></td>
      <td align="center"><xsl:value-of select="EANCode" /></td>
      <td align="center">
        <xsl:element name="a">
          <xsl:attribute name="href">
            <xsl:text>http://</xsl:text>
            <xsl:value-of select="Link" />
          </xsl:attribute>
          <xsl:attribute name="target">_blank</xsl:attribute>
          <xsl:text>look</xsl:text>
        </xsl:element>
      </td>
      <td align="left"><xsl:value-of select="Description" /></td>
      <xsl:for-each select="following-sibling::node()[name()='Qty']">
        <td align="center">
          <xsl:value-of select="QtyAvailable"/>
        </td>
      </xsl:for-each>
    </tr>
  </xsl:template>
</xsl:stylesheet>
