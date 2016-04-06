<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">

        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="main.css" />
            </head>
            <body>
                <h2>Bibliography</h2>
                <table class="table1">
                    <tr class="table-row">
                        <th class="table-header">Author *</th>
                        <th class="table-header">Title</th>
                        <th class="table-header">Publishing Year</th>
                        <th class="table-header">Other</th>
                    </tr>
                    <xsl:for-each select="bibliography/entry">
                        <xsl:sort select="author"/>
                        <tr class="table-row">
                            <td class="table-entry"><xsl:value-of select="author"/></td>
                            <td class="table-entry"><xsl:value-of select="title"/></td>
                            <td class="table-entry, number-field"><xsl:value-of select="year"/></td>
                            <td class="table-entry"><xsl:value-of select="other"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
                <table class="table2">
                    <tr class="table-row">
                        <th class="table-header">Author</th>
                        <th class="table-header">Title *</th>
                        <th class="table-header">Publishing Year</th>
                        <th class="table-header">Other</th>
                    </tr>
                    <xsl:for-each select="bibliography/entry">
                        <xsl:sort select="title"/>
                        <tr class="table-row">
                            <td class="table-entry"><xsl:value-of select="author"/></td>
                            <td class="table-entry"><xsl:value-of select="title"/></td>
                            <td class="table-entry, number-field"><xsl:value-of select="year"/></td>
                            <td class="table-entry"><xsl:value-of select="other"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
                <table class="table3">
                    <tr class="table-row">
                        <th class="table-header">Author</th>
                        <th class="table-header">Title</th>
                        <th class="table-header">Publishing Year *</th>
                        <th class="table-header">Other</th>
                    </tr>
                    <xsl:for-each select="bibliography/entry">
                        <xsl:sort select="year" data-type="number"/>
                        <xsl:sort select="author"/>
                        <tr class="table-row">
                            <td class="table-entry"><xsl:value-of select="author"/></td>
                            <td class="table-entry"><xsl:value-of select="title"/></td>
                            <td class="table-entry, number-field"><xsl:value-of select="year"/></td>
                            <td class="table-entry"><xsl:value-of select="other"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>

    </xsl:template>

</xsl:stylesheet>