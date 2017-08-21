
# PreisRoboter.de plugin user guide

<div class="container-toc"></div>

## 1 Registering with PreisRoboter.de

PreisRoboter.de is a product and price search engine that offers full text search and price comparisons. Please note that this website is currently only available in German.

## 2 Setting up the data format PreisRoboterDE-Plugin in plentymarkets

To use this format, you need the Elastic Export plugin.

Follow the instructions given on the [Exporting data formats for price search engines](https://knowledge.plentymarkets.com/en/basics/data-exchange/exporting-data#30) page of the manual to set up FashionDE-Plugin in plentymarkets.

The following table lists details for settings, format settings and recommended item filters for the format **PreisRoboterDE-Plugin**.
<table>
    <tr>
        <th>
            Settings
        </th>
        <th>
            Explanation
        </th>
    </tr>
    <tr>
        <td class="th" colspan="2">
            Settings
        </td>
    </tr>
    <tr>
        <td>
            Format
        </td>
        <td>
            Choose <b>PreisRoboterDE-Plugin</b>.
        </td>        
    </tr>
    <tr>
        <td>
            Provisioning
        </td>
        <td>
            Choose <b>URL</b>.
        </td>        
    </tr>
    <tr>
        <td>
            File name
        </td>
        <td>
            The file name must have the ending <b>.csv</b> for fashion.de to be able to import the file successfully.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Item filter
        </td>
    </tr>
    <tr>
        <td>
            Active
        </td>
        <td>
            Choose <b>Active</b>.
        </td>        
    </tr>
    <tr>
        <td>
            Markets
        </td>
        <td>
            Choose one or multiple order referrer. The chosen order referrer has to be active at the variation for the item to be exported.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Format settings
        </td>
    </tr>
    <tr>
        <td>
            Order referrer
        </td>
        <td>
            Choose the order referrer that should be assigned during the order import.
        </td>        
    </tr>
    <tr>
        <td>
            Preview text
        </td>
        <td>
            This option does not affect this format.
        </td>        
    </tr>
    <tr>
        <td>
            Image
        </td>
        <td>
            Choose <b>First image</b>.
        </td>        
    </tr>
    <tr>
        <td>
            RRP
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
    <tr>
        <td>
            MwSt.-Hinweis
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
    <tr>
        <td>
            Override item availabilty
        </td>
        <td>
            This option is not relevant for this format.
        </td>        
    </tr>
</table>

## 3 Overview of available columns
<table>
    <tr>
        <th>
            Spaltenbezeichnung
        </th>
        <th>
            Erläuterung
        </th>
    </tr>
    <tr>
        <td>
            art_number
        </td>
        <td>
            <b>Content:</b> The <b>ID</b> of the item.
        </td>        
    </tr>
    <tr>
		<td>
			art_name
		</td>
		<td>
			<b>Content:</b> According the format setting <b>Item name</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_price
		</td>
		<td>
			<b>Content:</b> The <b>retail price</b> of the variation, depending on the format setting <b>order referrer</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_url
		</td>
		<td>
			<b>Content:</b> The product URL according to the format setting <b>product URL</b> and <b>order referrer</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_img_url
		</td>
		<td>
			<b>Content:</b> URL of the image according to the format setting <b>Image</b>. Variation images are prioritized over item images.
		</td>        
	</tr>
	<tr>
		<td>
			art_description
		</td>
		<td>
			<b>Content:</b> The <b>description</b> of the item depending on the format setting <b>Description</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_versandkosten
		</td>
		<td>
			<b>Content:</b> According to the format setting <b>Shipping costs</b>.
		</td>        
	</tr>
	<tr>
		<td>
			lieferzeit
		</td>
		<td>
			<b>Content:</b> The <b>name of the item availability</b> under <b>Settings » Item » Item availability</b> or the translation according to the format setting <b>Item availability</b>.
		</td>        
	</tr>
	<tr>
		<td>
			ean_code
		</td>
		<td>
			<b>Content:</b> According to the format setting <b>Barcode</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_pzn
		</td>
		<td>
			<b>Content:</b> Empty.
		</td>        
	</tr>
	<tr>
		<td>
			art_producer
		</td>
		<td>
			<b>Content:</b> The <b>name of the manufacturer</b> of the item. The <b>external name</b> within <b>Settings » Items » Manufacturer</b> will be preferred if existing.
		</td>        
	</tr>
	<tr>
		<td>
			art_producer_number
		</td>
		<td>
			<b>Content:</b> The <b>Model</b> of the variation.
		</td>        
	</tr>
	<tr>
		<td>
			art_baseprice
		</td>
		<td>
			<b>Content:</b> The <b>base price information</b> in the format "price / unit" depending on the format setting <b>Language</b>.
		</td>        
	</tr>
</table>

## 4 License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-preis-roboter-de/blob/master/LICENSE.md).
