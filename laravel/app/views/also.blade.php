<!doctype html>
<html>
    <head>
        <title>NTPie Also</title>
        <meta charset="utf-8" />

        <style>
            img{
                height: 150px;
                width: 200px;
                margin: 40px;
            }
            
            .hidden{
                display: none;
            }
            
            .unhidden{
                display: block;
                background-color: #485563;
                position: absolute;
                top: 305px;
                left: 270px;
                max-width: 67.5%;
            }
        </style>        
        
        <script type="text/javascript">
            function unhide(motherboards_hidden) {
                var item = document.getElementById(motherboards_hidden);
                if (item) {
                    item.className=(item.className==='hidden')?'unhidden':'hidden';
                }
            }
            
            function unhide(hard_drives_hidden) {
                var item = document.getElementById(hard_drives_hidden);
                if (item) {
                    item.className=(item.className==='hidden')?'unhidden':'hidden';
                }
            }
            
            function unhide(ram_hidden) {
                var item = document.getElementById(ram_hidden);
                if (item) {
                    item.className=(item.className==='hidden')?'unhidden':'hidden';
                }
            }
            
            function unhide(gpu_hidden) {
                var item = document.getElementById(gpu_hidden);
                if (item) {
                    item.className=(item.className==='hidden')?'unhidden':'hidden';
                }
            }
            
        </script> 
        
        <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

         <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css"> 
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular.min.js"></script>
         
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular-cookies.js"></script> 
        
    </head>
    <body>
        <div class="container">
            <h1>Categories</h1>
            <div class="categories">
                <span class="motherboards">
                    <a href="javascript:unhide('motherboards_hidden');"><img src="http://www.guru3d.com/miraserver/images/2012/z77a-gd65-preview/IMG_5889.jpg" alt="mb_main" id="mb_main"></a>
                    <div id="motherboards_hidden" class="hidden">
                        <span id="intel">
                            <a href={{ URL::route('also/intelMB') }}><img src='http://1.bp.blogspot.com/_vo_vJFSyvQU/THgJoUx1SeI/AAAAAAAAACs/xR8InN7D5e4/s1600/intel+motherboard.jpg' alt='intel motherboards'></a>
                        </span>
                        <span id="amd">
                            <a href={{ URL::route('also/amdMB') }}><img src='http://img.hexus.net/v2/news/sapphire/SAPPHIRE_PI-AM2RS780G.jpg' alt='amd motherboards'></a>
                        </span>
                        <span id="server_mb">
                            <a href={{ URL::route('also/serverMB') }}><img src='http://images.anandtech.com/doci/6533/GA-7PESH1%20Oblique.jpg' alt='server motherboards'></a>
                        </span>
                        <span id="accessories_mb">
                            <a href={{ URL::route('also/accMB') }}><img src='http://www.scythe-eu.com/uploads/tx_cfamooflow/Thermal-Elixer-Unit_01.jpg' alt='motherboard accessories'></a>
                        </span>
                    </div>
                </span>
                <span class="hard_drives">
                    <a href="javascript:unhide('hard_drives_hidden');"><img src="http://www.techspot.com/articles-info/54/drive.jpg" alt="hdd_main" id="mb_main"></a>
                    <div id="hard_drives_hidden" class="hidden">
                        <span id="25_hdd">
                            <a href={{ URL::route('also/hdd25') }}><img src='http://ottawacomputech.com/catalog/images/WDScorpio.jpg' alt='2,5" internal hdd'></a>
                        </span>
                        <span id="35_hdd">
                            <a href={{ URL::route('also/hdd35') }}><img src='http://www.scsi4me.com/images/wd1003fbyx_tn_max.jpg' alt='3,5" internal hdd'></a>
                        </span>
                        <span id="server_hdd">
                            <a href={{ URL::route('also/serverHDD') }}><img src='http://www.emergingtechno.com/image/cache/data/HP%20Options/HP%20450GB%20HDD%206G%20SAS%2015K%20rpm%20LFF%203-5%20%28516826-B21%29%20NHP%20DP%20Ent%20Server-Storage%20Hard%20Disk%20Drive%20Price%20in%20Hyderabad-600x500.jpg' alt='server hdd'></a>
                        </span>
                        <span class="external">
                            <a href={{ URL::route('also/externalHDD') }}><img src='http://hothardware.com/newsimages/Item25717/wd-my-passport-ultra-main.jpg' alt='external hdd'></a>
                        </span>
                        <span class="accessories_hdd">
                            <a href={{ URL::route('also/accHDD') }}><img src='http://www.vortez.net/index.php?ct=news&action=file&id=2297' alt='hdd accessories'></a>
                        </span>
                        <span class="ssd">
                            <a href={{ URL::route('also/ssd') }}><img src='http://www.maximumpc.com/files/u69/ssds.jpg' alt='ssd'></a>
                        </span>
                    </div>
                </span>
                <span class="ram">
                    <a href="javascript:unhide('ram_hidden');"><img src="http://blog-images.barefootfloor.com/images/2012/01/Sticks-of-RAM.jpg" alt="ram_main" id="ram_main"></a>
                    <div id="ram_hidden" class="hidden">
                        <span id="ddr">
                            <a href={{ URL::route('also/ddrRAM') }}><img src='http://www.popularmemory.org/wp-content/uploads/computer-memory.jpg' alt='ddr ram'></a>
                        </span>
                        <span id="ddr2">
                            <a href={{ URL::route('also/ddr2RAM') }}><img src='http://www.thebuzzmedia.com/wp-content/uploads/2008/02/ddr_memory.jpg' alt='ddr2 ram'></a>
                        </span>
                        <span id="ddr3">
                            <a href={{ URL::route('also/ddr3RAM') }}><img src='http://www.pcper.com/images/news/SuperTalentHighDesnityKits.jpg' alt='ddr3 ram'></a>
                        </span>
                        <span id="ds_ram">
                            <a href={{ URL::route('also/dsRAM') }}><img src='http://static.techspot.com/fileshost/newspics3/2010/samsung-32gbddr3.jpg' alt='device specific ram'></a>
                        </span>
                    </div>
                </span>
                <span class="gpu">
                    <a href="javascript:unhide('gpu_hidden');"><img src="http://static.techspot.com/articles-info/603/images/graphics-cards-2.jpg" alt="gpu_main" id="gpu_main"></a>
                    <div id="gpu_hidden" class="hidden">
                        <span id="agpGPU">
                            <a href={{ URL::route('also/agpGPU') }}><img src='http://www.dansdata.com/images/hcards/hcards440.jpg' alt='agp gpu'></a>
                        </span>
                        <span id="pciGPU">
                            <a href={{ URL::route('also/pciGPU') }}><img src='http://www.techfuels.com/attachment.php?attachmentid=3665&d=1216113659' alt='pci gpu'></a>
                        </span>
                        <span id="pcieGPU">
                            <a href={{ URL::route('also/pcieGPU') }}><img src='http://images.pcworld.com/news/graphics/117070-2209P058_1B.jpg' alt='pcie gpu'></a>
                        </span>
                        <span id="accGPU">
                            <a href={{ URL::route('also/accGPU') }}><img src='http://cdn.ubergizmo.com/photos/2010/2/coolit-universal.JPG' alt='gpu accessories'></a>
                        </span>
                    </div>
                </span>
            </div>
        </div>
    </body>
</html>
