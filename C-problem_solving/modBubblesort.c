//2. Modify the bubble sort function to check at the end of each pass whether any swaps have
//been made. If none has been made, then the data must already be in the proper order, so the function
//should terminate. If swaps have been made, then at least one more pass is needed


void bubblesort_mod(int a[], int size){

int swaps;
int temp;

for (int pass = 1; pass < size; pass++){
    swaps = 0;

    for (int i = 0; i < size - pass; i++)
    {

        if (a[i] > a[i+1])
        {
            temp = a[i];
            a[i] = a[i + 1];
            a[i + 1] = temp;
            swaps++;
        }
    }
    if (swaps == 0)
    {
    break;
    }
}
}
