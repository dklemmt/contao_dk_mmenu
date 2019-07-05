mmenu - Mobile Navigation für Contao
====================================
[![Version](http://img.shields.io/packagist/v/dklemmt/contao_dk_mmenu.svg?style=flat-square)](https://packagist.org/packages/dklemmt/contao_dk_mmenu)
[![License](http://img.shields.io/packagist/l/dklemmt/contao_dk_mmenu.svg?style=flat-square)](http://spdx.org/licenses/MIT.html)
[![Downloads](http://img.shields.io/packagist/dt/dklemmt/contao_dk_mmenu.svg?style=flat-square)](https://packagist.org/packages/dklemmt/contao_dk_mmenu)

***mmenu*** ist ein JavaScript Plugin von Fred Heusschen, das ein platzsparendes Navigationsmenü erstellt. Es ist vor allem für mobile Webseiten/Layouts sinnvoll kann jedoch auch für große Layouts verwendet werden.

Nach der Installation dieser Erweiterung stehen innerhalb von Contao zwei zusätzliche Modultypen zur Verfügung, die von den beiden Core-Navigationstypen abgeleitet wurden und diese um die neue Funktionalität erweitern. Sie heißen *mmenu - Navigationsmenü* sowie *mmenu - Individuelle Navigation*. Darüber hinaus kann mit *mmenu - HTML* beliebiger Inhalt in ein mmenu ausgegeben werden.

Das Navigationsmenü ist standardmäßig versteckt. Mit Hilfe eines beliebigen Links wird der eigentliche Seiteninhalt je nach eingestellter Menü-Position verschoben. Damit dies funktioniert **muss** jedem Navigationsmenü in den Experten-Einstellungen des Moduls eine CSS-ID zugewiesen werden! Mit einer URL (`<a href="#CSS-ID"></a>`) auf diese wird das Menü bei Klick auf den Link eingeblendet.

Möglichkeiten der Erweiterung und von mmenu
-------------------------------------------

* beliebig viele Menüs auf einer Seite
* Menüs können beliebig viele Navigations-Elemente sowie Untermenüs enthalten
* Anzeige eines Zählers über die Anzahl der enthaltenen Untermenüs zu einem Navigations-Element
* Menü-Position: links, rechts, oben, unten oder als Pop-Up
* horizontal animierte Wechsel in Untermenüs oder nach unten aufklappende Untermenüs
* wahlweise Anzeige eines eingabesensitiven Suchfelds über die Navigations-Elemente
* verschiedene Themes

Quelle/Beispiele
----------------

https://mmenujs.com/

Tipps/Hinweise
--------------

* Der Seiteninhalt sollte einen nicht transparenten Hintergrund (Farbe/Bild) erhalten.
* Technisch bedingt wird für alle Navigationsmenüs auf der gleichen Seite das gleiche Theme benutzt.
* Wird beliebiges HTML eingebunden, so werden dafür keine CSS-Stile gesetzt. Dies ist so gewollt.

Lizenz Hinweise
---------------

Ab Version 2.0 verwendet diese Extension die neueste Version von mmenu, die für kommerzielle Zwecke lizenzpflichtig ist. 

Die Contao Academy hat hierfür am 22.12.2018 einen „Multiple websites license“ erworben und zur Verfügung gestellt, 
wodurch die Erweiterung auch zukünftig für kommerzielle Projekte ohne eigene Lizenz verwendet werden darf. Weitere 
Lizenz-Details siehe: https://mmenujs.com/download.html
