<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<xsl:stylesheet version="2.0"
	            xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
	            xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
	<xsl:template match="/">
		<html>
		<head>
			<style type="text/css">
				a {
					color: #0772a8;
				}

				.container {
					width: 1055px;
					margin: 0 auto 0 auto;
					padding: 50px 0 50px 0;
					font-family: "Open Sans", sans-serif;
				}

				.container > h1 {
					font-size: 24px;
					color: #202020;
				}

				.container > h2 {
					font-size: 14px;
					font-weight: normal;
					font-style: italic;
					color: #666;
				}

				table {
					text-align: left;
					width: 1055px;
				}

				table tr {
					padding: 10px 0;
					display: block;

				}

				table tr:nth-child(even) {
					border-top: 1px solid #eee;
					border-bottom: 1px solid #eee;
					background: #f9f9f9;
				}

				tr > td {
					display: block;
					float: left;
				}

				.url, .head {
					font-size: 12px;
				}

				.location {
					min-width: 525px;
					padding-left: 18px;
				}

				.lastmod {
					color: #202020;
					min-width: 260px;
				}

				.head td {
					font-weight: bold;
					color: #202020;
				}
			</style>
		</head>
		<body>
		<div class="container">
			<h1>XML Sitemap</h1>

			<h2>This is a XML file generated by
				<a href="<?php echo home_url( '/' ) ?>"><?php echo get_bloginfo( 'name' ) ?></a>
				and is supposed to be processed by search engines.<br/>
				You can find more information about XML sitemaps on <a href="http://www.sitemaps.org/">sitemaps.org</a>
				and Google's list of sitemap programs.
			</h2>
			<table>
				<tr class="head">
					<td class="location">URL</td>
					<td class="lastmod">Las Mod.</td>
				</tr>
				<xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">
					<tr class="url">
						<td class="location">
							<xsl:element name="a">
								<xsl:attribute name="href">
									<xsl:value-of select="sitemap:loc"/>
								</xsl:attribute>
								<xsl:attribute name="target">_blank</xsl:attribute>
								<xsl:value-of select="sitemap:loc"/>
							</xsl:element>
						</td>
						<td class="lastmod">
							<xsl:value-of select="sitemap:lastmod"/>
						</td>
					</tr>
				</xsl:for-each>
			</table>
		</div>
		</body>
		</html>
	</xsl:template>

</xsl:stylesheet>