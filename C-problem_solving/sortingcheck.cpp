//1. Write a function that takes an array of integers and tells whether it is sorted or not

int compare (int x, int y){
if (x > y)
{
    return (-1);
}

else
    return 0;

}
int checkSort(int a[],int size){
int result = 1;

for (int i = 0; i < size; i++)
{
    if (result == -1)
        break;
    result = compare(a[i], a[i + 1]);
}
return (result);
}
