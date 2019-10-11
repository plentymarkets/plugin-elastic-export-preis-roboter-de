
# PreisRoboter.de plugin user guide

<div class="container-toc"></div>

## 1 Registering with PreisRoboter.de

PreisRoboter.de is a product and price search engine that offers full text search and price comparisons. Please note that this website is currently only available in German.

## 2 Setting up the data format PreisRoboterDE-Plugin in plentymarkets

By installing this plugin you will receive the export format **PreisRoboterDE-Plugin**. Use this format to exchange data between plentymarkets and PreisRoboter.de. It is required to install the Plugin **Elastic Export** from the plentyMarketplace first before you can use the format **PreisRoboterDE-Plugin** in plentymarkets.

Once both plugins are installed, you can create the export format **PreisRoboterDE-Plugin**. Refer to the [Elastic Export](https://knowledge.plentymarkets.com/en/data/exporting-data/elastic-export) page of the manual for further details about the individual format settings.

Creating a new export format:

1. Go to **Data » Elastic export**.
2. Click on **New export**.
3. Carry out the settings as desired. Pay attention to the information given in table 1.
4. **Save** the settings.<br/> 
→ The export format is given an ID and it appears in the overview within the **Exports** tab.


The following table lists details for settings, format settings and recommended item filters for the format **PreisRoboterDE-Plugin**.

| **Setting**                                           | **Explanation** | 
| :---                                                  | :--- |
| **Settings**                                          | |
| **Name**                                              | Enter a name. The export format will be listed under this name in the overview within the **Exports** tab. |
| **Type**                                              | Select the type **Item** from the drop-down list. |
| **Format**                                            | Select **PreisRoboterDE-Plugin**. |
| **Limit**                                             | Enter a number. If you want to transfer more than 9,999 data records to the price search engine, then the output file will not be generated again for another 24 hours. This is to save resources. If more than 9,999 data records are necessary, the setting **Generate cache file** has to be active. |
| **Generate cache file**                               | Place a check mark if you want to transfer more than 9,999 data records to the price search engine. The output file will not be generated again for another 24 hours. We recommend not to activate this setting for more than 20 export formats. This is to save resources. |
| **Provisioning**                                      | Select **URL**. This option generates a token for authentication in order to allow external access. |
| **Token, URL**                                        | If you have selected the option **URL** under **Provisioning**, then click on **Generate token**. The token will be entered automatically. When the token is generated under **Token**, the URL is entered automatically. |
| **File name**                                         | The file name must have the ending **.csv** or **.txt** for PreisRoboter.de to be able to import the file successfully. |
| **Item filters**                                      | |
| **Add item filters**                                  | Select an item filter from the drop-down list and click on **Add**. There are no filters set in default. It is possible to add multiple item filters from the drop-down list one after the other.<br/> **Variations** = Select **Transfer all** or **Only transfer main variations**.<br/> **Markets** = Select one market, several or **ALL**.<br/> The availability for all markets selected here has to be saved for the item. Otherwise, the export will not take place.<br/> **Currency** = Select a currency.<br/> **Category** = Activate to transfer the item with its category link. Only items belonging to this category will be exported.<br/> **Image** = Activate to transfer the item with its image. Only items with images will be transferred.<br/> **Client** = Select client.<br/> **Stock** = Select which stocks you want to export.<br/> **Flag 1 - 2** = Select the flag.<br/> **Manufacturer** = Select one, several or **ALL** manufacturers.<br/> **Active** = Only active variations will be exported. |
| **Format settings**                                   | |
| **Product URL**                                       | Choose wich URL should be transferred to the price comparison portal, the item’s URL or the variation’s URL. Variation SKUs can only be transferred in combination with the Ceres store. |
| **Client**                                            | Select a client. This setting is used for the URL structure. |
| **URL parameter**                                     | Enter a suffix for the product URL if this is required for the export. If you have activated the transfer option for the product URL further up, then this character string will be added to the product URL. |
| **Order referrer**                                    | Select the order referrer that should be assigned during the order import. The selected referrer is added to the product URL so that sales can be analysed later. |
| **Market account**                                    | Select the market account from the drop-down list. |
| **Language**                                          | Select the language from the drop-down list. |
| **Item name**                                         | Select **Name 1**, **Name 2** or **Name 3**. These names are saved in the **Texts** tab of the item. Enter a number into the **Maximum number of characters (def. Text)** field if desired. This specifies how many characters should be exported for the item name. |
| **Preview text**                                      | This option does not affect this format. |
| **Description**                                       | Select the text that you want to transfer as description.<br/> Enter a number into the **Maximum number of characters (def. text)** field if desired. This specifies how many characters should be exported for the description.<br/> Activate the option **Remove HTML tags** if you want HTML tags to be removed during the export. If you only want to allow specific HTML tags to be exported, then enter these tags into the field **Permitted HTML tags, separated by comma (def. Text)**. Use commas to separate multiple tags. |
| **Target country**                                    | Select the target country from the drop-down list. |
| **Barcode**                                           | Select the ASIN, ISBN or an EAN from the drop-down list. The barcode has to be linked to the order referrer selected above. If the barcode is not linked to the order referrer it will not be exported. |
| **Image**                                             | Select **First image**. |
| **Image position of the energy efficiency label**     | Enter the position. Every image that should be transferred as an energy efficiency label must have this position. |
| **Stockbuffer**                                       | This option does not affect this format. |
| **Stock for variations without stock limitation**     | This option does not affect this format. |
| **Stock for variations with no stock administration** | This option does not affect this format. |
| **Live currency conversion**                          | Activate this option to convert the price into the currency of the selected country of delivery. The price has to be released for the corresponding currency. |
| **Retail price**                                      | Select gross price or net price from the drop-down list. |
| **Offer price**                                       | This option does not affect this format. |
| **RRP**                                               | This option does not affect this format. |
| **Shipping costs**                                    | Activate this option if you want to use the shipping costs that are saved in a configuration. If this option is activated, then you will be able to select the configuration and the payment method from the drop-down lists.<br/> Activate the option **Transfer flat rate shipping charge** if you want to use a fixed shipping charge. If this option is activated, a value has to be entered in the line underneath. |
| **VAT note**                                          | This option does not affect this format. |
| **Item availability**                                 | Activate the **overwrite** option and enter item availabilities into the fields **1** to **10**. The fields represent the IDs of the availabilities. This will overwrite the item availabilities that are saved in the menu **Setup » Item » Availability**. |
       
_Tab. 1: Settings for the data format **PreisRoboterDE-Plugin**_

## 3 Available columns for the export file

Go to **Data » Elastic export** and open the data format **PreisRoboterDE-Plugin** in order to download the export file. 

| **Column**          | **Explanation** |
| :---                | :--- |
| art_number          | The **ID** of the item. |
| art_name            | The **item name** according the format setting **Item name**. |
| art_price           | The **retail price** of the variation, according to the format settings **client** and **order referrer**. |
| art_url             | The **product URL** according to the format settings **client**, **order referrer** and **product URL**. |
| art_img_url	      | The URL of the image according to the format setting **Image**. Variation images are prioritised over item images. |
| art_description     | According to the format setting **Description**. |
| art_versandkosten   | According to the format setting **Shipping costs**. |
| art_lieferzeit      | The name of the **item availability** under **Setup » Item » Item availability** or the translation according to the format setting **Item availability**. |
| art_ean_code        | According to the format setting **Barcode**. |
| art_pzn             | Empty. |
| art_producer        | The **name of the manufacturer** of the item. The **external name** within **Setup » Items » Manufacturer** is preferred if existing. |
| art_producer_number | The **Model** of the variation. |
| art_baseprice       | The **base price information** in the format "price / unit" according to the format setting **Language**. (Example: 10.00 EUR / kilogram) |

## 4 License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-preis-roboter-de/blob/master/LICENSE.md).
