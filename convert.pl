while (<>) {
    # convert dependency from 'datatables' to 'tool_datatables/jquery.dataTables'
    s@define\((\s*)\['jquery',(\s*)'datatables'\]@define(['jquery','tool_datatables/jquery.dataTables']@g;

    s@define\(\s*['"]datatables['"],\s*@define(@g;
    print;
}
