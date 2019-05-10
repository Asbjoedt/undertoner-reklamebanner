# undertoner-reklamebanner
Et plugin til Undertoners WordPress-installation, der gør det muligt via backend at vise reklamebanner i headeren på alle Undertoners sider og indlæg uden at skulle ændre direkte i */themes/voice-child/sections/header.php*.

**Vejledning til installation:**
1. Kopiér mappen undertoner-reklamebanner til mappen */wp-content/plugins* over FTP
2. (Hvis ikke allerede eksisterer) Kopiér følgende kode ind i *header.php* det sted reklamen ønskes vist:

	```<?php if (function_exists('vis_undertoner_reklamebanner')) { vis_undertoner_reklamebanner(); } ?>```

3. Aktivér plugin i plugin kontrolpanelet i WordPress

**Vejledning til brug:**
1. Navigér til "Indstillinger" -> "Undertoner reklamebanner"
2. Kopiér link til annoncørens reklamedestination i første felt
3. Kopiér link til annoncørens billedereklame i andet felt
4. Sæt flueben i feltet "Reklamebanner synlig" og tryk på "Gem ændringer". 

OBS! Hvis reklamen skal tages ned igen fjern da fluebenet. Det er ikke nødvendigt at ændre links før ny reklame skal vises.
