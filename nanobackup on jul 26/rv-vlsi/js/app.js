/*global Ext:false */
/*

This file is part of Ext JS 4

Copyright (c) 2011 Sencha Inc

Contact:  http://www.sencha.com/contact

GNU General Public License Usage
This file may be used under the terms of the GNU General Public License version 3.0 as published by the Free Software Foundation and appearing in the file LICENSE included in the packaging of this file.  Please review the following information to ensure the GNU General Public License version 3.0 requirements will be met: http://www.gnu.org/copyleft/gpl.html.

If you are unsure which license is appropriate for your use, please contact the sales department at http://www.sencha.com/contact.

*/
Ext.require('Ext.tab.*');

Ext.onReady(function(){
    // basic tabs 1, built from existing content
      
    // second tabs built from JS
    var tabs2 = Ext.createWidget('tabpanel', {
        renderTo: document.body,
        activeTab: 0,
        width: 480,
        height: 377,
        tabPosition: 'bottom',
        plain: true,
        defaults :{
            autoScroll: true,
            bodyPadding:0
        },
        items: [{
                title: '<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="../images/ved-1.png" style="width:96px;height:65px;" />',
                html: '<iframe width="475" height="300" src="https://www.youtube.com/v/lMD8Ire58jY"></iframe>'
            },{
                title: '<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="6.jpg" style="width:96px;height:65px;" />',
                html: '<iframe width="475" height="300" src="https://www.youtube.com/v/lMD8Ire58jY"></iframe>'
				},
			{
                title: '<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="6.jpg" style="width:96px;height:65px;" />',
                html: '<iframe width="475" height="300" src="https://www.youtube.com/v/lMD8Ire58jY"></iframe>'
            },
			{
                title: '<img alt="“Embedded Systems Training” “Embedded Training in Bangalore” “VLSI Training institutes” "   src="6.jpg" style="width:96px;height:65px;" />',
                html: '<iframe width="475" height="300" src="https://www.youtube.com/v/lMD8Ire58jY"></iframe>'
            }
        ]
    });
});
