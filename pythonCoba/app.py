import matplotlib.pyplot as plt
import matplotlib.patches as mpatches

def create_flowchart():
    fig, ax = plt.subplots(figsize=(8, 10))
    ax.set_xlim(0, 1)
    ax.set_ylim(0, 1)
    ax.axis('off')
    
    # Define node positions (x, y)
    nodes = {
        'Start': (0.5, 0.9),
        'Display Navbar': (0.5, 0.75),
        'User Selects Menu': (0.5, 0.6),
        'Display Home': (0.5, 0.45),
        'Display About': (0.5, 0.3),
        'Display Services': (0.5, 0.15),
        'Display Contact': (0.5, 0.0)
    }

    # Draw nodes
    for label, pos in nodes.items():
        ax.text(pos[0], pos[1], label, 
                ha='center', va='center',
                bbox=dict(boxstyle='round,pad=0.5', 
                        facecolor='lightblue', 
                        edgecolor='black',
                        linewidth=2))

    # Draw arrows
    node_order = [
        'Start',
        'Display Navbar',
        'User Selects Menu',
        'Display Home',
        'Display About',
        'Display Services',
        'Display Contact'
    ]
    
    # Add arrows between nodes
    for i in range(len(node_order)-1):
        start = nodes[node_order[i]]
        end = nodes[node_order[i+1]]
        ax.annotate('', 
                   xy=end, 
                   xytext=start,
                   arrowprops=dict(arrowstyle='->', 
                                 color='black', 
                                 linewidth=2,
                                 shrinkA=15, 
                                 shrinkB=15))

    # Add End node below last node
    ax.text(0.5, -0.05, 'End', 
           ha='center', va='center',
           bbox=dict(boxstyle='round,pad=0.5', 
                   facecolor='salmon', 
                   edgecolor='black',
                   linewidth=2))
    
    # Add final arrow
    ax.annotate('', 
              xy=(0.5, -0.05), 
              xytext=(0.5, 0.0),
              arrowprops=dict(arrowstyle='->', 
                            color='black', 
                            linewidth=2,
                            shrinkA=15, 
                            shrinkB=15))

    plt.savefig('flowchart.png', bbox_inches='tight')
    plt.close()

create_flowchart()
