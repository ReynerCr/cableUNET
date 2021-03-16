//addchannels.js
/* JavaScript file required to create a new TV cable service */

var button = document.getElementById("add_channel");
var channelList = document.getElementById("channel_list");
var channels = [];

var select = document.getElementById("select_channel");
/**
 * Check for the selected option in select, then gets the value and
 * creates an li element with a nested p to show channel name
 * and creates a hidden input to store the channel id.
 */
button.onclick = function()
{
    var selectedOption = select.options[select.selectedIndex].value;
    for (var i = 0; i < channels.length; i++) { // check if added
        if (channels[i].children[1].value == selectedOption)
            return;
    }
    var li = document.createElement("li");
    var p = document.createElement("p");
    p.textContent = select.options[select.selectedIndex].textContent;
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "ch"+channels.length);
    input.value = selectedOption;
    li.appendChild(p);
    li.appendChild(input);
    channelList.appendChild(li);

    channels.push(li);
};
