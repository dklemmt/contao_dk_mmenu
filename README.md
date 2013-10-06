mmenu - Mobile Navigation für Contao
====================================

***mmenu*** ist ein jQuery-Plugin von Fred Heusschen, das ein platzsparendes Navigationsmenü erstellt. Es ist vor allem für mobile Webseiten/Layouts sinnvoll kann jedoch auch für große Layouts verwendet werden.

Nach der Installation dieser Erweiterung stehen innerhalb von Contao zwei zusätzliche Modultypen zur Verfügung, die von den beiden Core-Navigationstypen abgeleitet wurden und diese um die neue Funktionalität erweitern. Sie heißen *mmenu - Navigationsmenü* sowie *mmenu - Individuelle Navigation*. Darüber hinaus kann mit *mmenu - Artikel* ein beliebiger Artikel in ein mmenu ausgegeben werden.

Das Navigationsmenü ist standardmäßig versteckt. Mit Hilfe eines beliebigen Links wird der eigentliche Seiteninhalt je nach eingestellter Menü-Position verschoben. Damit dies funktioniert **muß** jedem Navigationsmenü in den Experten-Einstellungen des Moduls eine CSS-ID zugewiesen werden! Mit einer URL (`<a href="#CSS-ID"></a>`) auf diese wird das Menü bei Klick auf den Link eingeblendet.

Möglichkeiten der Erweiterung und von mmenu
-------------------------------------------

* beliebig viele Menüs auf einer Seite
* Menüs können beliebig viele Navigations-Elemente sowie Untermenüs enthalten
* Anzeige eines Zählers über die Anzahl der enthaltenen Untermenüs zu einem Navigations-Element
* Menü-Position: links, rechts, oben, unten
* horizontal animierte Wechsel in Untermenüs oder nach unten aufklappende Untermenüs
* wahlweise Anzeige eines eingabesensitiven Suchfelds über die Navigations-Elemente
* verschiedene Themes

Quelle/Beispiele
----------------

http://mmenu.frebsite.nl/

Tipps/Hinweise
--------------

* Damit mmenu gestartet wird, muß im Seitenlayout *jQuery* zum Layout hinzugefügt werden.
* Der Seiteninhalt sollte einen nicht transparenten Hintergrund (Farbe/Bild) erhalten.
* Technisch bedingt wird für alle Navigationsmenüs auf der gleichen Seite das gleiche Theme benutzt.
* Das Standard-Theme hat eine dunkle Ausgangsgestaltung. Bei den helleren Themes - *mittelgrau*, *hellgrau* und *hell* - wird eine zusätzliche CSS-Datei eingebunden, die eine hellere Ausgangsgestaltung beinhaltet. Je nachdem wie man sein Menü farblich gestalten möchte, sollte man dann ein helles oder dunkles Theme als Ausgang wählen.
* Wird ein Artikel eingebunden, so werden für diesen keine CSS-Stile gesetzt. Dies ist so gewollt.
