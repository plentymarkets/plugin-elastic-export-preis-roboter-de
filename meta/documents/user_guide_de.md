
# User Guide für das Elastic Export PreisRoboter.de Plugin

<div class="container-toc"></div>

## 1 Bei PreisRoboter.de registrieren

PreisRoboter ist eine Produkt- und Preissuchmaschine, die Volltextsuche und Preisvergleiche anbietet.

## 2 Das Format PreisRoboterDE-Plugin in plentymarkets einrichten

Mit der Installation dieses Plugins erhältst du das Exportformat **PreisRoboterDE-Plugin**, mit dem du Daten über den elastischen Export zu PreisRoboter.de überträgst. Um dieses Format für den elastischen Export nutzen zu können, installiere zunächst das Plugin **Elastic Export** aus dem plentyMarketplace, wenn noch nicht geschehen.

Sobald beide Plugins in deinem System installiert sind, kann das Exportformat **PreisRoboterDE-Plugin** erstellt werden. Weitere Informationen findest du auf der Handbuchseite [Elastischer Export](https://knowledge.plentymarkets.com/daten/daten-exportieren/elastischer-export).

Neues Exportformat erstellen:

1. Öffne das Menü **Daten » Elastischer Export**.
2. Klicke auf **Neuer Export**.
3. Nimm die Einstellungen vor. Beachte dazu die Erläuterungen in Tabelle 1.
4. **Speichere** die Einstellungen.<br/> 
→ Eine ID für das Exportformat **PreisRoboterDE-Plugin** wird vergeben und das Exportformat erscheint in der Übersicht **Exporte**.

In der folgenden Tabelle findest du Hinweise zu den einzelnen Formateinstellungen und empfohlenen Artikelfiltern für das Format **PreisRoboterDE-Plugin**.

| **Einstellung**                                     | **Erläuterung** | 
| :---                                                | :--- |
| **Einstellungen**                                   | |
| **Name**                                            | Name eingeben. Unter diesem Namen erscheint das Exportformat in der Übersicht im Tab **Exporte**. |
| **Typ**                                             | Typ **Artikel** aus der Dropdown-Liste wählen. |
| **Format**                                          | **PreisRoboterDE-Plugin** wählen. |
| **Limit**                                           | Zahl eingeben. Wenn mehr als 9999 Datensätze an die Preissuchmaschine übertragen werden sollen, wird die Ausgabedatei wird für 24 Stunden nicht noch einmal neu generiert, um Ressourcen zu sparen. Wenn mehr mehr als 9999 Datensätze benötigt werden, muss die Option **Cache-Datei generieren** aktiv sein. |
| **Cache-Datei generieren**                          | Häkchen setzen, wenn mehr als 9999 Datensätze an die Preissuchmaschine übertragen werden sollen. Um eine optimale Performance des elastischen Exports zu gewährleisten, darf diese Option bei maximal 20 Exportformaten aktiv sein. |
| **Bereitstellung**                                  | **URL** wählen. Mit dieser Option kann ein Token für die Authentifizierung generiert werden, damit ein externer Zugriff möglich ist. |
| **Token, URL**                                      | Wenn unter **Bereitstellung** die Option **URL** gewählt wurde, auf **Token generieren** klicken. Der Token wird dann automatisch eingetragen. Die URL wird automatisch eingetragen, wenn unter **Token** der Token generiert wurde. |
| **Dateiname**                                       | Der Dateiname muss auf **.csv** oder **.txt** enden, damit PreisRoboter.de die Datei erfolgreich importieren kann. |
| **Artikelfilter**                                   | |
| **Artikelfilter hinzufügen**                        | Artikelfilter aus der Dropdown-Liste wählen und auf **Hinzufügen** klicken. Standardmäßig sind keine Filter voreingestellt. Es ist möglich, alle Artikelfilter aus der Dropdown-Liste nacheinander hinzuzufügen.<br/> **Varianten** = **Alle übertragen** oder **Nur Hauptvarianten übertragen** wählen.<br/> **Märkte** = Einen, mehrere oder **ALLE** Märkte wählen. Die Verfügbarkeit muss für alle hier gewählten Märkte am Artikel hinterlegt sein. Andernfalls findet kein Export statt.<br/> **Währung** = Währung wählen.<br/> **Kategorie** = Aktivieren, damit der Artikel mit Kategorieverknüpfung übertragen wird. Es werden nur Artikel, die dieser Kategorie zugehören, übertragen.<br/> **Bild** = Aktivieren, damit der Artikel mit Bild übertragen wird. Es werden nur Artikel mit Bildern übertragen.<br/> **Mandant** = Mandant wählen.<br/> **Bestand** = Wählen, welche Bestände exportiert werden sollen.<br/> **Markierung 1 - 2** = Markierung wählen.<br/> **Hersteller** = Einen, mehrere oder **ALLE** Hersteller wählen.<br/> **Aktiv** = Nur aktive Varianten werden übertragen. |
| **Formateinstellugen**                              | |
| **Produkt-URL**                                     | Wählen, ob die URL des Artikels oder der Variante an das Preisportal übertragen wird. Varianten URLs können nur in Kombination mit dem Ceres Webshop übertragen werden. |
| **Mandant**                                         | Mandant wählen. Diese Einstellung wird für den URL-Aufbau verwendet. |
| **URL-Parameter**                                   | Suffix für die Produkt-URL eingeben, wenn dies für den Export erforderlich ist. Die Produkt-URL wird dann um die eingegebene Zeichenkette erweitert, wenn weiter oben die Option **übertragen** für die Produkt-URL aktiviert wurde. |
| **Auftragsherkunft**                                | Aus der Dropdown-Liste die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll. Die Produkt-URL wird um die gewählte Auftragsherkunft erweitert, damit die Verkäufe später analysiert werden können. |
| **Marktplatzkonto**                                 | Marktplatzkonto aus der Dropdown-Liste wählen. |
| **Sprache**                                         | Sprache aus der Dropdown-Liste wählen. |
| **Artikelname**                                     | **Name 1**, **Name 2** oder **Name 3** wählen. Die Namen sind im Tab **Texte** eines Artikels gespeichert.<br/> Im Feld **Maximale Zeichenlänge (def. Text)** optional eine Zahl eingeben, wenn die Preissuchmaschine eine Begrenzung der Länge des Artikelnamen beim Export vorgibt. |
| **Vorschautext**                                    | Diese Option ist für dieses Format nicht relevant. |
| **Beschreibung**                                    | Wählen, welcher Text als Beschreibungstext übertragen werden soll.<br/> Im Feld **Maximale Zeichenlänge (def. Text)** optional eine Zahl eingeben, wenn die Preissuchmaschine eine Begrenzung der Länge der Beschreibung beim Export vorgibt.<br/> Option **HTML-Tags entfernen** aktivieren, damit die HTML-Tags beim Export entfernt werden.<br/> Im Feld **Erlaubte HTML-Tags, kommagetrennt (def. Text)** optional die HTML-Tags eingeben, die beim Export erlaubt sind. Wenn mehrere Tags eingegeben werden, mit Komma trennen. |
| **Zielland**                                        | Zielland aus der Dropdown-Liste wählen. |
| **Barcode**                                         | ASIN, ISBN oder eine EAN aus der Dropdown-Liste wählen. Der gewählte Barcode muss mit der oben gewählten Auftragsherkunft verknüpft sein. Andernfalls wird der Barcode nicht exportiert. |
| **Bild**                                            | **Erstes Bild** wählen. |
| **Bildposition des Energieetiketts**                | Position des Energieetikettes eintragen. Alle Bilder die als Energieetikette übertragen werden sollen, müssen diese Position haben. |
| **Bestandspuffer**                                  | Diese Option ist für dieses Format nicht relevant. |
| **Bestand für Varianten ohne Bestandsbeschränkung** | Diese Option ist für dieses Format nicht relevant. |
| **Bestand für Varianten ohne Bestandsführung**      | Diese Option ist für dieses Format nicht relevant. |
| **Währung live umrechnen**                          | Aktivieren, damit der Preis je nach eingestelltem Lieferland in die Währung des Lieferlandes umgerechnet wird. Der Preis muss für die entsprechende Währung freigegeben sein. |
| **Verkaufspreis**                                   | Brutto- oder Nettopreis aus der Dropdown-Liste wählen. |
| **Angebotspreis**                                   | Diese Option ist für dieses Format nicht relevant. |
| **UVP**                                             | Diese Option ist für dieses Format nicht relevant. |
| **Versandkosten**                                   | Aktivieren, damit die Versandkosten aus der Konfiguration übernommen werden. Wenn die Option aktiviert ist, stehen in den beiden Dropdown-Listen Optionen für die Konfiguration und die Zahlungsart zur Verfügung. Option **Pauschale Versandkosten übertragen** aktivieren, damit die pauschalen Versandkosten übertragen werden. Wenn diese Option aktiviert ist, muss im Feld darunter ein Betrag eingegeben werden. |
| **MwSt.-Hinweis**                                   | Diese Option ist für dieses Format nicht relevant. |
| **Artikelverfügbarkeit**                            | Option **überschreiben** aktivieren und in die Felder **1** bis **10**, die die ID der Verfügbarkeit darstellen, Artikelverfügbarkeiten< eintragen. Somit werden die Artikelverfügbarkeiten, die im Menü **Einrichtung » Artikel » Verfügbarkeit** eingestellt wurden, überschrieben. |
       
_Tab. 1: Einstellungen für das Datenformat **PreisRoboterDE-Plugin**_

## 3 Verfügbare Spalten der Exportdatei

| **Spaltenbezeichnung** | **Erläuterung** |
| :---                   | :--- |
| art_number             | Die **Artikel-ID** der Variante. |
| art_name               | Der **Artikelname** entsprechend der Formateinstellung **Artikelname**. |
| art_price              | Der **Verkaufspreis** der Variante entsprechend den Formateinstellungen **Mandant** und **Auftragsherkunft**. |
| art_url                | Der **URL-Pfad** des Artikels abhängig von den Formateinstellungen **Mandant**, **Auftragsherkunft** und **Produkt-URL**. |
| art_img_url	         | URL des Bildes gemäß der Formateinstellungen **Bild**. Variantenbilder werden vor Artikelbildern priorisiert. |
| art_description        | Entsprechend der Formateinstellung **Beschreibung**. |
| art_versandkosten      | Entsprechend der Formateinstellung **Versandkosten**. |
| art_lieferzeit         | Der **Name der Artikelverfügbarkeit** unter **Einrichtung » Artikel » Artikelverfügbarkeit** oder die Übersetzung gemäß der Formateinstellung **Artikelverfügbarkeit überschreiben**. |
| art_ean_code           | Entsprechend der Formateinstellung **Barcode**. |
| art_pzn                | Leer. |
| art_producer           | Der **Hersteller** des Artikels. Der **Externe Name** unter **Einrichtung » Artikel » Hersteller** wird priorisiert, wenn vorhanden. |
| art_producer_number    | Das **Modell** der Variante. |
| art_baseprice          | Die **Grundpreisinformation** im Format "Preis / Einheit" entsprechend der Formateinstellung **Sprache**. (Beispiel: 10,00 EUR / Kilogramm) |

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen findest du in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-preis-roboter-de/blob/master/LICENSE.md).
