
# User Guide für das Elastic Export PreisRoboter.de Plugin

<div class="container-toc"></div>

## 1 Bei PreisRoboter.de registrieren

PreisRoboter ist eine Produkt- und Preissuchmaschine, die Volltextsuche und Preisvergleiche anbietet.

## 2 Das Format PreisRoboterDE-Plugin in plentymarkets einrichten

Um dieses Format nutzen zu können, benötigen Sie das Plugin Elastic Export.

Auf der Handbuchseite [Daten exportieren](https://www.plentymarkets.eu/handbuch/datenaustausch/daten-exportieren/#4) werden die einzelnen Formateinstellungen beschrieben.

In der folgenden Tabelle finden Sie Hinweise zu den Einstellungen, Formateinstellungen und empfohlenen Artikelfiltern für das Format **PreisRoboterDE-Plugin**.
<table>
    <tr>
        <th>
            Einstellung
        </th>
        <th>
            Erläuterung
        </th>
    </tr>
    <tr>
        <td class="th" colspan="2">
            Einstellungen
        </td>
    </tr>
    <tr>
        <td>
            Format
        </td>
        <td>
            <b>PreisRoboterDE-Plugin</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Bereitstellung
        </td>
        <td>
            <b>URL</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Dateiname
        </td>
        <td>
            Der Dateiname muss auf <b>.csv</b> oder <b>.txt</b> enden, damit MyBestBrands.de die Datei erfolgreich importieren kann.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Artikelfilter
        </td>
    </tr>
    <tr>
        <td>
            Aktiv
        </td>
        <td>
            <b>Aktiv</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Märkte
        </td>
        <td>
            Eine oder mehrere Auftragsherkünfte wählen. Die gewählten Auftragsherkünfte müssen an der Variante aktiviert sein, damit der Artikel exportiert wird.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Formateinstellungen
        </td>
    </tr>
    <tr>
        <td>
            Auftragsherkunft
        </td>
        <td>
            Die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll.
        </td>        
    </tr>
    <tr>
		<td>
			Vorschautext
		</td>
		<td>
			Diese Option ist für dieses Format nicht relevant.
		</td>        
	</tr>
	<tr>
		<td>
			Bild
		</td>
		<td>
			<b>Erstes Bild</b> wählen.
		</td>        
	</tr>
	<tr>
		<td>
			UVP
		</td>
		<td>
			Diese Option ist für dieses Format nicht relevant.
		</td>        
	</tr>
    <tr>
        <td>
            Angebotspreis
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
    <tr>
        <td>
            MwSt.-Hinweis
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
</table>


## 3 Übersicht der verfügbaren Spalten

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
            <b>Inhalt:</b> Die <b>Artikel-ID</b> der Variante.
        </td>        
    </tr>
    <tr>
		<td>
			art_name
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Artikelname</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_price
		</td>
		<td>
			<b>Ausgabe:</b> Hier steht der <b>Verkaufspreis</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_url
		</td>
		<td>
			<b>Inhalt:</b> Der <b>URL-Pfad</b> des Artikels abhängig vom gewählten <b>Mandanten</b> in den Formateinstellungen.
		</td>        
	</tr>
	<tr>
		<td>
			art_img_url
		</td>
		<td>
			<b>Inhalt:</b> URL zu dem Bild gemäß der Formateinstellungen <b>Bild</b>. Variantenbilder werden vor Artikelbildern priorisiert.
		</td>        
	</tr>
	<tr>
		<td>
			art_description
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Beschreibung</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_versandkosten
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Versandkosten</b>.
		</td>        
	</tr>
	<tr>
		<td>
			lieferzeit
		</td>
		<td>
			<b>Inhalt:</b> Der <b>Name der Artikelverfügbarkeit</b> unter <b>Einstellungen » Artikel » Artikelverfügbarkeit</b> oder die Übersetzung gemäß der Formateinstellung <b>Artikelverfügbarkeit überschreiben</b>.
		</td>        
	</tr>
	<tr>
		<td>
			ean_code
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Barcode</b>.
		</td>        
	</tr>
	<tr>
		<td>
			art_pzn
		</td>
		<td>
			<b>Inhalt:</b> Leer
		</td>        
	</tr>
	<tr>
		<td>
			art_producer
		</td>
		<td>
			<b>Inhalt:</b> Der <b>Hersteller</b> des Artikels. Der <b>Externe Name</b> unter <b>Einstellungen » Artikel » Hersteller</b> wird priorisiert, wenn vorhanden.
		</td>        
	</tr>
	<tr>
		<td>
			art_producer_number
		</td>
		<td>
			<b>Inhalt:</b> Das <b>Modell</b> der Variante.
		</td>        
	</tr>
	<tr>
		<td>
			art_baseprice
		</td>
		<td>
			<b>Inhalt:</b> Die <b>Grundpreisinformation</b> im Format "Preis / Einheit". (Beispiel: 10,00 EUR / Kilogramm)
		</td>        
	</tr>
</table>

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-preis-roboter-de/blob/master/LICENSE.md).
