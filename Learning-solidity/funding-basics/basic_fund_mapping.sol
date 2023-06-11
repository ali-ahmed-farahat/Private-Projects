// SPDX-License-Identifier: MIT

pragma solidity >= 0.6.0 < 0.9.0;


contract fundme{

mapping (address => uint256) public addressToValue;


function fund() public payable {

    addressToValue[msg.sender] += msg.value; 
    //we need to know ETH -> USD converstion rate 
}

}
