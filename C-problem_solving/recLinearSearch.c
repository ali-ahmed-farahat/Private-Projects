//write a linear search function using recursion

void linearSearch(int a[], int size, int i, int target){

if (i > size - 1)
{
    printf("this number doesn't exist\n");
    return;
}

if (a[i] == target)
{
    printf("the number %d exists in the order %d", target, i+1);
    return;
}
else
{
    linearSearch(a, size, i + 1, target);
}
}
