// SPDX-License-Identifier: MIT

pragma solidity >= 0.6.0 < 0.9.0;

import "./SimpleStorage.sol";

contract StorageFactory is SimpleStorage{ //this is statement inherites all simple storage functions
    SimpleStorage[] public simplestoragearray;
    
    function create_ss() public { //creating simple storage contract
        SimpleStorage simplestorage = new SimpleStorage();
        simplestoragearray.push(simplestorage);
    }

    function storenumber (uint256 _number, uint256 _index) public{
     SimpleStorage(address(simplestoragearray[_index])).store(_number);
    }

    function sfget(uint256 index) public view returns(uint256) {
        return SimpleStorage(address(simplestoragearray[index])).retrieve();
    }
}
